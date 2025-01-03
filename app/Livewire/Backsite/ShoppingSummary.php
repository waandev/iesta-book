<?php

namespace App\Livewire\Backsite;

use Livewire\Component;

class ShoppingSummary extends Component
{
    public $items;
    public $shippingCost = [];
    public $selectedShippingOption = null;

    protected $listeners = ['shippingOptionUpdated'];

    public function mount($items)
    {
        $this->items = $items;
    }

    public function shippingOptionUpdated($selectedCost)
    {
        // Menyimpan data biaya pengiriman yang dipilih
        $this->selectedShippingOption = $selectedCost;
    }

    public function render()
    {
        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($this->items as $item) {
            $totalQuantity += $item->quantity;
            $totalPrice += $item->quantity * $item->publication->price;
        }

        $shippingCost = $this->selectedShippingOption['cost'] ?? 0;
        $shoppingTotal = $totalPrice + $shippingCost;

        // dd($shoppingTotal);

        // Emit event dengan shopping total
        $this->dispatch('updateShoppingTotal', $shoppingTotal);

        return view('livewire.backsite.shopping-summary', [
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
            'selectedShippingOption' => $this->selectedShippingOption,
            'shoppingTotal' => $shoppingTotal,
        ]);
    }
}
