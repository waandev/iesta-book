<?php

namespace App\Livewire\Backsite;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use DB;
use Livewire\Component;
use Midtrans\Config;
use Midtrans\Snap;
use RealRashid\SweetAlert\Facades\Alert;

class MidtransPayment extends Component
{
    public $snapToken;
    public $shoppingTotal;
    public $purchaseMethod;

    protected $listeners = ['purchaseMethodUpdated', 'updateShoppingTotal'];

    public function purchaseMethodUpdated($value)
    {
        $this->purchaseMethod = $value;
        $this->checkAndCreateSnapToken();
    }

    public function updateShoppingTotal($shoppingTotal)
    {
        $this->shoppingTotal = $shoppingTotal;
        $this->checkAndCreateSnapToken();
    }

    public function checkAndCreateSnapToken()
    {
        if ($this->purchaseMethod && $this->shoppingTotal) {
            $this->createSnapToken();
        }
    }

    public function createSnapToken()
    {

        Config::$serverKey = config('services.midtrans.server_key');
        Config::$clientKey = config('services.midtrans.client_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'order-' . time(),
                'gross_amount' => $this->shoppingTotal,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ],
            'callback_url' => env('APP_URL') . '/payment/callback',
        ];

        $this->snapToken = Snap::getSnapToken($params);

        $this->dispatch('snapTokenGenerated');
    }

    public function saveOrder()
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'gross_amount' => $this->shoppingTotal,
            'sender_name' => Auth::user()->name,
            'status' => 'pending', // Status order sementara
            'payment_method' => 'automatic',
            'purchase_method' => $this->purchaseMethod,
        ]);

        $cartItems = CartItem::where('cart_id', Cart::where('user_id', Auth::id())->first()->id)
            ->where('is_selected', 1)
            ->get();

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'publication_id' => $item->publication_id,
                'quantity' => $item->quantity,
            ]);

            $publication = $item->publication;
            $publication->decrement('stock', $item->quantity);
            $publication->increment('sold', $item->quantity);
        }

        $cart = Cart::where('user_id', Auth::id())->first();

        CartItem::where('cart_id', Cart::where('user_id', Auth::id())->first()->id)
            ->where('is_selected', 1)
            ->forceDelete();

        $totalPrice = CartItem::where('cart_id', $cart->id)
            ->join('publications', 'cart_items.publication_id', '=', 'publications.id')
            ->sum(DB::raw('publications.price * cart_items.quantity'));

        $cart->update(['total_price' => $totalPrice]);
    }

    public function render()
    {
        return view('livewire.backsite.midtrans-payment', [
            'snapToken' => $this->snapToken,
        ]);
    }
}
