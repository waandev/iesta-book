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
use Midtrans\Config;
use Midtrans\Notification;

class MidtransWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Inisialisasi konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);

        // Terima notifikasi webhook dari Midtrans
        $notification = new Notification();

        // Temukan order berdasarkan order_id
        $order = Order::where('order_id', $notification->order_id)->first();

        if ($order) {
            // Update status berdasarkan status transaksi
            $status = $notification->transaction_status;
            $order->status = $this->getOrderStatus($status, $notification);
            $order->save();

            // Jika status 'paid', proses cart dan order item
            if ($order->status == 'paid') {
                $this->processCartItems($order);
            }
        }

        return response()->json(['status' => 'success']);
    }

    // Fungsi untuk menentukan status order
    private function getOrderStatus($status, $notification)
    {
        switch ($status) {
            case 'capture':
                return $notification->fraud_status == 'challenge' ? 'pending' : 'paid';
            case 'settlement':
                return 'paid';
            case 'pending':
                return 'pending';
            case 'deny':
            case 'expire':
            case 'cancel':
                return 'failed';
            default:
                return 'unknown';
        }
    }

    // Fungsi untuk memproses cart items dan order items
    private function processCartItems($order)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItems = CartItem::where('cart_id', $cart->id)->where('is_selected', 1)->get();

        foreach ($cartItems as $item) {
            // Membuat order item berdasarkan cart item
            OrderItem::create([
                'order_id' => $order->id,
                'publication_id' => $item->publication_id,
                'quantity' => $item->quantity,
            ]);

            // Update stok dan jumlah terjual publikasi
            $item->publication->decrement('stock', $item->quantity);
            $item->publication->increment('sold', $item->quantity);
        }

        // Hapus item yang dipilih dari cart
        CartItem::where('cart_id', $cart->id)->where('is_selected', 1)->delete();

        // Update total harga cart
        $totalPrice = CartItem::where('cart_id', $cart->id)
            ->join('publications', 'cart_items.publication_id', '=', 'publications.id')
            ->sum(DB::raw('publications.price * cart_items.quantity'));

        $cart->update(['total_price' => $totalPrice]);
    }
}
