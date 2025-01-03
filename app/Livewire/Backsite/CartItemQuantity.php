<?php

namespace App\Livewire\Backsite;

use App\Models\CartItem;
use Livewire\Component;

class CartItemQuantity extends Component
{
    public $quantity;
    public $cartItemId;
    public $stock;

    public function mount($cartItem)
    {
        $this->quantity = $cartItem->quantity;
        $this->cartItemId = $cartItem->id;
        $this->stock = $cartItem->publication->stock;
    }

    public function increment()
    {
        if ($this->quantity < $this->stock) {
            $this->quantity++;
            $this->updateCartItem();
        }
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updateCartItem();
        }
    }

    public function updateCartItem()
    {
        $cartItem = CartItem::find($this->cartItemId);
        $cartItem->quantity = $this->quantity;
        $cartItem->save();

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.backsite.cart-item-quantity');
    }
}
