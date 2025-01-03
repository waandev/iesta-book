<?php

namespace App\Livewire\Backsite;

use Livewire\Component;

class PurchaseMethod extends Component
{
    public $selectedOption = '';

    public function mount() {}

    public function updatedSelectedOption($value)
    {
        $this->dispatch('purchaseMethodUpdated', $value);
    }

    public function render()
    {
        return view('livewire.backsite.purchase-method');
    }
}
