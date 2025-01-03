<?php

namespace App\Livewire\Backsite;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selectedOrder = null;

    public function showTransaction($orderId)
    {
        $this->selectedOrder = Order::with('orderItem.publication')
            ->findOrFail($orderId);
    }

    public function closeModal()
    {
        $this->selectedOrder = null;
    }

    public function render()
    {
        $orders = Order::with('orderItem.publication')
            ->latest()
            ->paginate(10);

        return view('livewire.backsite.transaction-list', compact('orders'));
    }
}
