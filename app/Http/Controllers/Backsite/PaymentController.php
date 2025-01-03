<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use DB;
use Illuminate\Http\Request;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function handleCallback(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key && $request->transaction_status == 'settlement') {
            DB::beginTransaction();

            try {

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
    }

    public function handleFinish(Request $request)
    {
        return view('payment.finish');
    }
}
