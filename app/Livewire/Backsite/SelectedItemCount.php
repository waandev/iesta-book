<?php

namespace App\Livewire\Backsite;

use App\Models\CartItem;
use Auth;
use Livewire\Component;

class SelectedItemCount extends Component
{
    public $count = 0;

    protected $listeners = ['cart-updated' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        $cart = Auth::user()->cart;

        $this->count = $cart ? $cart->cartItem()->where('is_selected', true)->sum('quantity') : 0;
    }

    public function placeOrder()
    {
        $cart = Auth::user()->cart;

        $selectedItems = $cart->cartItem()->where('is_selected', true)->get();

        if ($selectedItems->isEmpty()) {
            session()->flash('error', 'No items selected for order.');
            return;
        }

        // Simpan item terpilih ke dalam sesi untuk diakses di halaman shipment
        session()->put('selected_cart_items', $selectedItems);

        // Redirect ke halaman cart/shipment
        return redirect()->route('customer.cart.shipment');
    }


    public function render()
    {
        return view('livewire.backsite.selected-item-count');
    }
}
