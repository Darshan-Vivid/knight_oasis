<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function show_bookings(){
        $bookings = Booking::orderBy('updated_at', 'desc')->get();
        return view('admin.bookings.booking')->with(["bookings"=>$bookings]);
    }
    
    public function show_single_booking($id){
        $booking = Booking::findOrFail($id);
        $transaction = Transaction::where("transaction_id", $booking->transaction_id)->first();
        return view('admin.bookings.single')->with(["booking"=>$booking,"transaction"=>$transaction]);
    }
    
    
    public function show_transactions(){
        $transactions = Transaction::orderBy('updated_at', 'desc')->get();
        return view('admin.bookings.transactions')->with(["transactions"=>$transactions]);
    }

    public function show_offline_booking(){

        $pay_methods = ['CASH'];

        $services = Service::where('status',1)->get();
        $rooms = Room::select('id', 'name')->get();

        return view('admin.bookings.offline_booking')
                ->with([
                    'pay_methods'=>$pay_methods,
                    'rooms'=>$rooms,
                    'services'=>$services,
                ]);
    }

    public function store_offline_booking(Request $request){

        $rules = [
            'guest_full_name' => 'required|string',
            'guest_email' => 'required|email',
            'guest_phone' => 'required',
            'guest_address' => 'nullable|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:0',
            'children' => 'nullable|integer|min:0',
            'room_count' => 'required|integer|min:0',
            'room_type' => 'required|integer',
            'services' => 'nullable|array',
            'pay_method' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
            'guest_note' => 'nullable|string|max:1000',
        ];

        $messages = [
            'guest_full_name.required' => 'Guest full name is required.',
            'guest_email.required' => 'Guest email is required.',
            'guest_email.email' => 'Please enter a valid email address.',
            'guest_phone.required' => 'Guest phone number is required.',
            'check_in.required' => 'Check-in date is required.',
            'check_in.date' => 'Check-in must be a valid date.',
            'check_out.required' => 'Check-out date is required.',
            'check_out.date' => 'Check-out must be a valid date.',
            'check_out.after' => 'Check-out date must be after the check-in date.',
            'adults.required' => 'Please specify the number of adults.',
            'adults.integer' => 'Adults must be a valid number.',
            'adults.min' => 'Adult count cannot be negative.',
            'children.integer' => 'Children count must be a valid number.',
            'children.min' => 'Children count cannot be negative.',
            'room_count.required' => 'Please specify the number of rooms.',
            'room_count.integer' => 'Room count must be a valid number.',
            'room_count.min' => 'Room count cannot be negative.',
            'room_type.required' => 'Please select a room type.',
            'room_type.integer' => 'Room type must be a valid ID.',
            'services.array' => 'Services must be an array.',
            'pay_method.required' => 'Please select a payment method.',
            'total_amount.required' => 'Total amount is required.',
            'total_amount.numeric' => 'Total amount must be a valid number.',
            'total_amount.min' => 'Total amount count cannot be negative.',
            'guest_note.string' => 'Guest note must be a valid text.',
            'guest_note.max' => 'Guest note cannot exceed 1000 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $guest_info["name"] = $request->guest_full_name  ;
            $guest_info["email"] = $request->guest_email  ;
            $guest_info["phone"] = $request->guest_phone  ;
            $guest_info["address"] = $request->guest_address ?$request->guest_address:"";

            $transaction = new Transaction;
            $transaction->amount =$request->total_amount;
            $transaction->method =$request->pay_method;
            $transaction->status = 1;
            $transaction->transaction_id =Str::uuid();
            $transaction->save();

            $booking = new Booking;
            $booking->type  = "OFFLINE";
            $booking->check_in  = $request->check_in;
            $booking->check_out  =$request->check_out;
            $booking->adults  =$request->adults;
            $booking->children  =$request->children;
            $booking->room_count  =$request->room_count;
            $booking->room_id  =$request->room_type;
            $booking->services  =(isset($request->services) && count($request->services)>0) ? json_encode($request->services) : "[]";
            $booking->total_cost  =$request->total_amount;
            $booking->transaction_id  =$transaction->transaction_id;
            $booking->customer_note  =(isset($request->guest_note) && strlen($request->guest_note) > 0)? $request->guest_note : null;
            $booking->customer_details  = json_encode($guest_info);
            $booking->save();

            return redirect()->route('view.bookings');
        }
    }

    public function edit_booking($id){
        $booking     = Booking::findOrFail($id);
        $room        = Room::find($booking->room_id);
        $transection = Transaction::where("transaction_id", $booking->transaction_id)->first();
        $services    = Service::where('status',1)->get();

        return view('admin.bookings.edit')
                ->with([
                    'booking'=>$booking,
                    'transection'=>$transection,
                    'room'=>$room,
                    'services'=>$services,
                ]);

    }
}
