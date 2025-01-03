<?php

namespace App\Livewire\Backsite;

use App\Models\CartItem;
use Auth;
use Livewire\Component;

class PriceDetails extends Component
{
    public $totalItems = 0;
    public $totalPrice = 0;
    public $payableAmount = 0;

    protected $listeners = ['cart-updated' => 'calculatePrices'];

    public function mount()
    {
        $this->calculatePrices();
    }

    public function calculatePrices()
    {
        $cart = Auth::user()->cart;

        $cartItems = $cart->cartItem()->where('is_selected', true)->get();

        $this->totalItems = $cartItems->sum('quantity');
        $this->totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->publication->price;
        });

        $this->payableAmount = $this->totalPrice;
    }

    public function render()
    {
        return view('livewire.backsite.price-details');
    }
}
