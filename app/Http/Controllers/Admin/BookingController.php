<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function show_manual_booking(){

        $pay_methods = ['CASHFREE', 'UPI', 'CASH', 'PAYUMONEY','DEBIT CARD',"CREDIT CARD"];

        $services = Service::where('status',1)->get();
        $rooms = Room::select('id', 'name')->get();

        return view('admin.bookings.manual_booking')
                ->with([
                    'pay_methods'=>$pay_methods,
                    'rooms'=>$rooms,
                    'services'=>$services,
                ]);
    }

    public function store_manual_booking(Request $request){

        $rules = [
            'guest_full_name' => 'required|string',
            'guest_email' => 'required|email',
            'guest_phone' => 'required',
            'guest_address' => 'required|string',
            'chack_in' => 'required|date',
            'chack_out' => 'required|date|after:chack_in',
            'adults' => 'required|integer|min:0',
            'children' => 'nullable|integer|min:0',
            'room_count' => 'required|integer|min:0',
            'room_type' => 'required|integer',
            'services' => 'nullable|array',
            'pay_method' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
            'guest_note' => 'string|max:1000',
        ];

        $messages = [
            'guest_full_name.required' => 'Guest full name is required.',
            'guest_email.required' => 'Guest email is required.',
            'guest_email.email' => 'Please enter a valid email address.',
            'guest_phone.required' => 'Guest phone number is required.',
            'guest_address.required' => 'Guest address is required.',
            'chack_in.required' => 'Check-in date is required.',
            'chack_in.date' => 'Check-in must be a valid date.',
            'chack_out.required' => 'Check-out date is required.',
            'chack_out.date' => 'Check-out must be a valid date.',
            'chack_out.after' => 'Check-out date must be after the check-in date.',
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
            dd($request->all());
        }

        
    }


}
