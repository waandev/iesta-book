<?php

namespace App\Livewire\Backsite;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use DB;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Midtrans\Config;
use Midtrans\Snap;

class CardPayment extends Component
{
    use WithFileUploads;

    public $method = null;
    public $senderName = '';
    public $transferProof;
    public $purchaseMethod = null;
    public $showModal = false;
    public $shoppingTotal = 0;

    protected $listeners = ['updateShoppingTotal', 'purchaseMethodUpdated'];

    public function purchaseMethodUpdated($value)
    {
        $this->purchaseMethod = $value;
    }

    public function updateShoppingTotal($shoppingTotal)
    {
        $this->shoppingTotal = $shoppingTotal;
    }

    public function submitPaymentProof()
    {
        $this->validate([
            'senderName' => 'required|string',
            'transferProof' => 'required|image|max:2048', // Maksimal 2MB
        ]);

        $proofPath = $this->transferProof->store('payment_proofs', 'public');

        $order = Order::create([
            'user_id' => Auth::id(),
            'gross_amount' => $this->shoppingTotal,
            'sender_name' => $this->senderName,
            'transfer_proof' => $proofPath,
            'status' => 'pending',
            'payment_method' => $this->method,
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

        $this->showModal = false;
        alert()->success('Payment Successful', 'Your payment was successfully processed.');
        return redirect()->route('customer.dashboard.index');
    }

    public function render()
    {
        return view('livewire.backsite.card-payment', [
            'shoppingTotal' => $this->shoppingTotal,
        ]);
    }
}
