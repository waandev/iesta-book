<?php

namespace App\Livewire\Frontsite;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartMenu extends Component
{
    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        // Safely check if the user is authenticated
        if (Auth::check()) {
            $this->cartCount = CartItem::whereHas('cart', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->sum('quantity');
        } else {
            // Reset cart count if the user is not authenticated
            $this->cartCount = 0;
        }
    }

    public function render()
    {
        return view('livewire.frontsite.cart-menu');
    }
}
