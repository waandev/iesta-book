<?php

namespace App\Livewire\Backsite;

use App\Models\CartItem;
use Livewire\Component;

class CartItemSelect extends Component
{
    public $cartItemId;
    public $isSelected;

    public function mount($cartItem)
    {
        $this->cartItemId = $cartItem->id;
        $this->isSelected = $cartItem->is_selected;
    }

    public function toggleSelection()
    {
        $cartItem = CartItem::find($this->cartItemId);
        $cartItem->is_selected = !$cartItem->is_selected;
        $cartItem->save();

        $this->isSelected = $cartItem->is_selected;

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.backsite.cart-item-select');
    }
}
