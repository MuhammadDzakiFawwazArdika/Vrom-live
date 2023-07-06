<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Midtrans\Notification;
use Midtrans\Config;
use Illuminate\Http\Request;

class MidtransCallbackController extends Controller
{
    public function callback()
    {
        //set konfigurasion
        Config::$serverKey = Config('server.midtrans.serverKey');
        Config::$isProduction = Config('server.midtrans.isProduction');
        Config::$isSanitized = Config('server.midtrans.isSanitized');
        Config::$is3ds = Config('server.midtrans.is3ds');

        //Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memmudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $orderId = $notification->order_id;

        //Cari Transaksi berdasarkan id
        $booking = Booking::findOrFail(explode($orderId, '-')[1]); // VROM-11123

        //Handle Notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $booking->payment_status = 'pending';
                } else {
                    $booking->payment_status = 'success';
                }
            }
        } elseif ($status == 'settlement') {
            $booking->payment_status = 'success';
        } elseif ($status == 'pending') {
            $booking->payment_status = 'pending';
        } elseif ($status == 'deny') {
            $booking->payment_status = 'cancelled';
        } elseif ($status == 'expire') {
            $booking->payment_status = 'cancelled';
        } elseif ($status == 'cancel') {
            $booking->payment_status = 'cancelled';
        }

        //Simpan Transaksi
        $booking->save();

        //Return Response
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Success'
            ]
        ]);
    }
}
