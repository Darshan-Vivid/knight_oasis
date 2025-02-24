<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Http\Controllers\Controller;
use App\Models\AbandonedCart;
use App\Models\Booking;
use App\Models\Country;
use App\Models\Room;
use App\Models\Service;
use App\Models\Transaction;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function show_bookings()
    {
        $bookings = Booking::orderBy('updated_at', 'desc')->get();
        return view('admin.bookings.booking')->with(["bookings" => $bookings]);
    }

    public function show_single_booking($id)
    {
        $booking = Booking::findOrFail($id);
        $transaction = Transaction::where("transaction_id", $booking->transaction_id)->first();
        return view('admin.bookings.single')->with(["booking" => $booking, "transaction" => $transaction]);
    }

    public function show_transactions()
    {
        $transactions = Transaction::orderBy('updated_at', 'desc')->get();
        return view('admin.bookings.transactions')->with(["transactions" => $transactions]);
    }

    public function show_offline_booking()
    {

        $pay_methods = ['CASH'];

        $services = Service::where('status', 1)->get();
        $rooms = Room::select('id', 'name')->get();

        return view('admin.bookings.offline_booking')
            ->with([
                'pay_methods' => $pay_methods,
                'rooms' => $rooms,
                'services' => $services,
            ]);
    }

    public function store_offline_booking(Request $request)
    {

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
            'extra_beds' => 'required|integer|min:0',
            'services' => 'nullable',
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
            'room_type.required' => 'Please select a valid room type.',
            'extra_beds.required' => 'Please enter a valid number or 0.',
            'extra_beds.integer' => 'Quantity should 0 or more',
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
        } else {

            $is_availavle = $this->check_room_availability($request->room_type, $request->room_count, $request->check_in, $request->check_out);
            if (!$is_availavle) {
                return redirect()->back()->withErrors(['check_out' => 'Not enough rooms available between this dates.'])->withInput();
            }

            $guest_info["name"] = $request->guest_full_name;
            $guest_info["email"] = $request->guest_email;
            $guest_info["phone"] = $request->guest_phone;
            $guest_info["address"] = $request->guest_address ? $request->guest_address : "";

            $transaction = new Transaction;
            $transaction->amount = $request->total_amount;
            $transaction->method = $request->pay_method;
            $transaction->status = 1;
            $transaction->transaction_id = Str::uuid();
            $transaction->save();

            $booking = new Booking;
            $booking->type = "OFFLINE";
            $booking->check_in = $request->check_in;
            $booking->check_out = $request->check_out;
            $booking->adults = $request->adults;
            $booking->children = $request->children;
            $booking->room_count = $request->room_count;
            $booking->room_id = $request->room_type;
            $booking->extra_beds = $request->extra_beds;
            $booking->services = (isset($request->services) && count($request->services) > 0) ? json_encode($request->services) : "[]";
            $booking->total_cost = $request->total_amount;
            $booking->transaction_id = $transaction->transaction_id;
            $booking->customer_note = (isset($request->guest_note) && strlen($request->guest_note) > 0) ? $request->guest_note : null;
            $booking->customer_details = json_encode($guest_info);
            $booking->save();

            return redirect()->route('view.bookings');
        }
    }

    public function edit_booking($id)
    {
        $booking = Booking::findOrFail($id);
        $rooms = Room::all();
        $transection = Transaction::where("transaction_id", $booking->transaction_id)->first();
        $services = Service::where('status', 1)->get();
        $pay_methods = ['CASH'];

        return view('admin.bookings.edit')
            ->with([
                'booking' => $booking,
                'transection' => $transection,
                'rooms' => $rooms,
                'services' => $services,
                'pay_methods' => $pay_methods,

            ]);

    }

    public function save_edit_booking(Request $request, int $id)
    {

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
            'services' => 'nullable',
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
            'guest_note.string' => 'Guest note must be a valid text.',
            'guest_note.max' => 'Guest note cannot exceed 1000 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $booking = Booking::find($request->id);

        if (!$booking) {
            return redirect()->back()->withErrors(['general' => 'Unable to update the booking.']);
        } elseif ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $is_availavle = $this->check_room_availability($request->room_type, $request->room_count, $request->check_in, $request->check_out);
            if (!$is_availavle) {
                return redirect()->back()->withErrors(['check_out' => 'Not enough rooms available between this dates.'])->withInput();
            }

            if ($booking->type == "OFFLINE") {
                $guest_info["name"] = $request->guest_full_name;
                $guest_info["email"] = $request->guest_email;
                $guest_info["phone"] = $request->guest_phone;
                $guest_info["address"] = $request->guest_address ? $request->guest_address : "";
                $booking->customer_details = json_encode($guest_info);
            }

            $booking->check_in = $request->check_in;
            $booking->check_out = $request->check_out;
            $booking->adults = $request->adults;
            $booking->children = $request->children;
            $booking->room_count = $request->room_count;
            $booking->room_id = $request->room_type;
            $booking->services = (isset($request->services) && count($request->services) > 0) ? json_encode($request->services) : "[]";
            $booking->customer_note = (isset($request->guest_note) && strlen($request->guest_note) > 0) ? $request->guest_note : null;
            $booking->save();

            return redirect()->route('view.bookings');
        }
    }

    public function checkRoomAvailability(Request $request)
    {
        $rules = [
            'room_id' => 'required|integer|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
            'quantity' => 'required|integer|min:1',
        ];

        $messages = [
            "room_id.*" => "Unable to find room.",
            "check_in.required" => "Check In date is required.",
            "check_in.date" => "Check In must be a valid date.",
            "check_in.after_or_equal" => "Check In must not be older than today.",
            "check_out.required" => "Check Out date is required.",
            "check_out.date" => "Check Out must be a valid date.",
            "check_out." => "Check Out must not be older than Check In date.",
            "quantity.required" => "Room Quantity is required",
            "quantity.integer" => "Room Quantity must be in a valid number",
            "quantity.min" => "At least 1 room require for process booking "
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();
            $firstError = $errorMessages[0] ?? 'Validation failed.';

            return response()->json([
                'status' => 0,
                'message' => $firstError
            ]);
        }

        $roomId = $request->room_id;
        $checkIn = $request->check_in;
        $checkOut = $request->check_out;
        $requestedQuantity = $request->quantity;

        $is_availavle = $this->check_room_availability($roomId, $requestedQuantity, $checkIn, $checkOut);
        if (!$is_availavle) {
            return response()->json(['status' => 0, 'message' => 'Not enough rooms available between this dates.']);
        }

        return response()->json(['status' => 1, 'message' => 'Booking Allowed. Rooms are available.']);
    }

    public function book_stay(Request $request)
    {
        $rules = [
            'check_in' => 'required|date|after_or_equal:today',
            'room_id' => 'required|integer|exists:rooms,id',
            'check_out' => 'required|date|after_or_equal:check_in',
            'quantity' => 'required|integer|min:1',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'extra_beds' => 'nullable|integer|min:0',
            'services' => 'nullable',
        ];

        $messages = [
            "room_id.*" => "Unable to find room.",
            "check_in.required" => "Check In date is required.",
            "check_in.date" => "Check In must be a valid date.",
            "check_in.after_or_equal" => "Check In must not be older than today.",
            "check_out.required" => "Check Out date is required.",
            "check_out.date" => "Check Out must be a valid date.",
            "check_out." => "Check Out must not be older than Check In date.",
            "quantity.required" => "Room Quantity is required",
            "quantity.integer" => "Room Quantity must be in a valid number",
            "quantity.min" => "At least 1 room require for process booking ",
            "adults.required" => "At least 1 adult person is required",
            "adults.integer" => "Adults must be in a valid number",
            "adults.min" => "At least 1 adult person is required ",
            "children.integer" => "Children must be in a valid number",
            "children.min" => "Children count cannot be negative",
            "extra_beds.integer" => "Extra Beds must be in a valid number",
            "extra_beds.min" => "Extra Beds count cannot be negative",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $is_availavle = $this->check_room_availability($request->room_id, $request->quantity, $request->check_in, $request->check_out);
            if (!$is_availavle) {
                return redirect()->back()->withErrors(['general' => 'Not enough rooms available between this dates.'])->withInput();
            }

            $room = Room::findOrFail($request->room_id);
            $ac = new AbandonedCart;

            if (Auth::check()) {
                $user = Auth::user();
                $ac->user_id = $user->id;
            }

            $ac->check_in = $request->check_in;
            $ac->check_out = $request->check_out;
            $ac->adults = $request->adults;
            $ac->children = $request->children ?? 0;
            $ac->room_id = $request->room_id;
            $ac->room_count = $request->quantity;
            $ac->extra_beds = $request->extra_beds ?? 0;
            $ac->services = (isset($request->services) && count($request->services) > 0) ? json_encode($request->services) : "[]";

            $check_in = new DateTime($request->check_in);
            $check_out = new DateTime($request->check_out);

            $interval = $check_in->diff($check_out);

            $days = $interval->days + 1;

            $total = $room->offer_price * $request->quantity;

            if ($request->extra_beds > 0) {
                $total += $room->bed_price * $request->extra_beds;
            }

            if (isset($request->services) && count($request->services) > 0) {
                foreach ($request->services as $sid) {
                    $service = Service::find($sid);
                    if (isset($service->id) && $service->status == 1) {
                        $total += $service->price;
                    } else {
                        return redirect()->back()->withErrors(['general' => 'One of your selected services we cannot provide. ']);
                    }
                }
            }

            $grand_total = $total * $days;
            $ac->total_cost = $grand_total;
            $ac->save();

            if ($ac->id) {
                Session::put('abandoned_cart', $ac->id);
                return redirect()->route('view.cart');
            } else {
                return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
            }
        }
    }

    public function show_cart()
    {
        $acid = Session::get('abandoned_cart');

        if (!$acid) {
            return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
        }

        try {
            $services = [];
            $ac = AbandonedCart::findOrFail($acid);
            $room = Room::find($ac->room_id);

            $sids = json_decode($ac->services);
            if (count($sids) > 0) {
                $services = Service::whereIn('id', $sids)->get();
            }

            return view('cart')->with(['ac' => $ac, 'room' => $room, 'services' => $services]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
        }
    }

    public function store_cart(Request $request)
    {
        $rules = [
            'count' => 'required|integer|min:1',
        ];

        $messages = [
            "count.required" => "Room count is required",
            "count.integer" => "Room count must be in a valid number",
            "count.min" => "At least 1 room require for process booking ",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $acid = Session::get('abandoned_cart');

            if ($acid) {
                $ac = AbandonedCart::find($acid);

                if ($ac->room_count != $request->count) {
                    $is_availavle = $this->check_room_availability($ac->room_id, $request->count, $ac->check_in, $ac->check_out);
                    if (!$is_availavle) {
                        return redirect()->back()->withErrors(['general' => 'Not enough rooms available between this dates.']);
                    }

                    $room = Room::findOrFail($ac->room_id);

                    $rp = $room->offer_price;

                    $checkInDate = new DateTime($ac->check_in);
                    $checkOutDate = new DateTime($ac->check_out);
                    $interval = $checkInDate->diff($checkOutDate);
                    $dayGap = $interval->days + 1;
                    $days = $dayGap > 0 ? $dayGap : 1;
                    $room_charges = $rp * $days;
                    $twrc = $ac->total_cost - $room_charges;
                    $total = $twrc + ($request->count * $rp * $days);

                    $ac->total_cost = $total;
                    $ac->room_count = $request->count;
                    $ac->save();
                }
                return redirect()->route('view.checkout');
            } else {
                return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
            }
        }


    }

    public function remove_item($id)
    {
        $acid = Session::get('abandoned_cart');

        if ($acid = $id) {
            AbandonedCart::find($acid)->delete();
            Session::forget('abandoned_cart');
            return response()->json([
                'status' => 'success',
                'redirect_url' => route('view.rooms')
            ]);
        }
    }

    public function show_checkout()
    {

        $acid = Session::get('abandoned_cart');

        if (!$acid) {
            return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
        }

        try {
            $ac = AbandonedCart::findOrFail($acid);
            $room = Room::find($ac->room_id);

            $countries = Country::select('c_code', 'c_name')->distinct('c_name')->get()->sortBy(function ($country) {
                return (int) filter_var($country->c_code, FILTER_SANITIZE_NUMBER_INT);
            });

            if (Auth::user()) {
                $user = Auth::user();
                $sid = Country::where('s_name', '=', $user->state)->where('c_name', '=', $user->country)->first();

                return view('checkout')->with(['user' => $user, 'countries' => $countries, 'sid' => $sid, 'ac' => $ac, 'room' => $room]);
            }

            return view('checkout')->with(['countries' => $countries, 'ac' => $ac, 'room' => $room]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
        }

    }

    public function checkout(Request $request)
    {
        
        if (Auth::user()) {
            $rules = [
                'gateway' => 'required|in:CASHFREE,PAYUMONEY',
            ];
        }else{
            $rules = [
                'name' => 'required|min:2',
                'email' => 'required|email|unique:users,email',
                'mobile' => 'required|min:10',
                'country' => 'required',
                'state' => 'required',
                'gateway' => 'required|in:CASHFREE,PAYUMONEY',
            ];
        }
        
        $messages = [
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 2 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'Email already exists in our system, please login with the same email.',
            'mobile.required' => 'The mobile field is required.',
            'mobile.min' => 'The mobile must be at least 10 characters.',
            'country.required' => 'The country code field is required.',
            'state.required' => 'The state field is required.',
            'gateway.required' => 'Please select any one payment method.',
            'gateway.in' => 'Invalid payment method selected.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $acid = Session::get('abandoned_cart');

            if (!$acid) {
                return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
            }

            try {

                $ac = AbandonedCart::findOrFail($acid);
                $room = Room::find($ac->room_id);
                $booking = new Booking;
                $transaction = new Transaction;

                if(Auth::user()){
                    $user = Auth::user();
                    $booking->type = $user->id;
                    $guest_info["phone"]= $user->mobile;
                }else{
                    $guest_info["name"] = $request->name;
                    $guest_info["email"] = $request->email;
                    $guest_info["phone"] = $request->mobile;
                    $guest_info["address"] = $request->state.','.$request->country;
                    $booking->customer_details = json_encode($guest_info);
                }

                $transaction->amount = $ac->total_cost;
                $transaction->method = $request->gateway;
                $transaction->status = 0;
                $transaction->transaction_id = Str::uuid();
                // $transaction->save();

                $booking->type = "WEBSITE";
                $booking->check_in = $ac->check_in;
                $booking->check_out = $ac->check_out;
                $booking->adults = $ac->adults;
                $booking->children = $ac->children;
                $booking->room_id = $ac->room_id;
                $booking->room_count = $ac->room_count;
                $booking->extra_beds = $ac->extra_beds;
                $booking->services = $ac->services ?? "[]";
                $booking->total_cost = $ac->total_cost;
                $booking->customer_note = (isset($request->guest_note) && strlen($request->guest_note) > 0) ? $request->guest_note : null;
                $booking->transaction_id = $transaction->transaction_id;
                // $booking->save();

                if( $transaction->method == 'CASHFREE'){

                    $orderData = [
                        "order_id" => $transaction->transaction_id,
                        "order_amount" => $ac->total_cost,
                        "order_currency" => "INR",
                        "customer_details" => [
                            "customer_phone" => $guest_info["phone"],
                        ],
                        "order_meta" => [
                            "return_url" => route('cashfree.success', $transaction->transaction_id),
                            "payment_methods" => explode(',', env('CASHFREE_PAYMENT_METHODS')),
                        ]
                    ];
        
                    $apiEndpoint = (env('PAYMENTS_MODE') === "PRODUCTION") ? env('CASHFREE_BASE_URL') : env('CASHFREE_SANDBOX_URL');
                    $apiKey = env('CASHFREE_APP_ID');
                    $apiSecret = env('CASHFREE_SECRET_KEY');


                    $response = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'x-client-id' => $apiKey,
                        'x-client-secret' => $apiSecret,
                        'x-api-version' => env('CASHFREE_API_VERSION'),
                    ])->post($apiEndpoint, $orderData);
    
                    $responseData = $response->json();

                    dd($responseData);
    
                    if (isset($responseData['payment_session_id']) && !empty($responseData['payment_session_id'])) {
                        $paymentSessionId = $responseData['payment_session_id'];
                        $mode = (env('PAYMENTS_MODE') === "PRODUCTION") ? 'production' :'sandbox';
    
                        return view('payments.cashfree_checkout', [
                            'paymentSessionId' => $paymentSessionId,
                            'mode' => $mode
                        ]);
                    } else {
                        return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
                    }
                }elseif($transaction->method == 'CASHFREE'){

                }else{
                    
                    return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
                }
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['general' => 'Unable to process your request.']);
            }

        }
    }

    public function CashFreeSuccess(Request $request)
    {
        $order_id = $request->input('order_id');
        $tx_status = $request->input('txStatus');

        if ($tx_status === 'SUCCESS') {
            return "Payment for Order ID {$order_id} was successful!";
        } else {
            return "Payment for Order ID {$order_id} failed.";
        }
    }


    public function quick_book(Request $request){

        $rules = [
            'room_type' => 'required|integer|exists:rooms,id',
            'quantity' => 'required|integer|min:1',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
        ];

        $messages = [
            "room_type.*" => "Unable to find room.",
            "check_in.required" => "Check In date is required.",
            "check_in.date" => "Check In must be a valid date.",
            "check_in.after_or_equal" => "Check In must not be older than today.",
            "check_out.required" => "Check Out date is required.",
            "check_out.date" => "Check Out must be a valid date.",
            "check_out." => "Check Out must not be older than Check In date.",
            "quantity.required" => "Room Quantity is required",
            "quantity.integer" => "Room Quantity must be in a valid number",
            "quantity.min" => "At least 1 room require for process booking "
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            $is_availavle = $this->check_room_availability($request->room_type, $request->quantity, $request->check_in, $request->check_out);
            if (!$is_availavle) {
                return redirect()->back()->withErrors(['quick_reserve' => 'Not enough rooms available between this dates.'])->withInput();
            }

            return redirect()->route("view.room", $request->room_type);

        }


    }

    private function check_room_availability(int $roomId, int $quantity, $checkIn, $checkOut)
    {

        $room = Room::find($roomId);
        $totalRooms = $room->quantity;

        $bookings = Booking::where('room_id', $roomId)->get();

        $reservedRooms = [];

        foreach ($bookings as $booking) {
            $transaction = Transaction::where('transaction_id','=',$booking->transaction_id)->first(); 

            if($transaction->status == 1){
                $period = CarbonPeriod::create(
                    $booking->check_in->format('Y-m-d'),
                    $booking->check_out->format('Y-m-d')
                );
                
                foreach ($period as $date) {
                    $dateString = $date->format('Y-m-d');
                    $reservedRooms[$dateString] = ($reservedRooms[$dateString] ?? 0) + $booking->room_count;
                }
            }
        }

        $requestedPeriod = CarbonPeriod::create($checkIn, $checkOut);
        foreach ($requestedPeriod as $date) {
            $dateString = $date->format('Y-m-d');
            $roomsBooked = $reservedRooms[$dateString] ?? 0;

            if ($roomsBooked + $quantity > $totalRooms) {
                return false;
            }
        }
        return true;
    }

}
