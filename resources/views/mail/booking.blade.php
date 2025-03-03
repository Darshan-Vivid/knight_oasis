{{ $mailData }}
@php
    $booking = App\Models\Booking::find($mailData); 
    $transaction =  App\Models\Transaction::where('transaction_id', $booking->transaction_id)->first();
@endphp
<pre>
    <?php var_dump($booking)?>
    <?php var_dump($transaction)?>
</pre>