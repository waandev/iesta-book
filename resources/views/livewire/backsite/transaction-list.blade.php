<div>
    @forelse ($orders as $order)
        <div class="card pull-up">
            <div class="card-header">
                <div class="float-left">
                    <span class="text-muted">{{ $order->created_at->format('d M Y') }}</span>
                    <div class="badge border-success success round badge-border ml-2 mr-2">
                        <span>{{ ucwords($order->status) }}</span>
                    </div>
                    <span class="text-black-50">INV/20241113/1234567890</span>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body py-0">
                    @foreach ($order->orderItem as $index => $orderItem)
                        @if ($index == 0)
                            <div class="d-flex justify-content-between align-items-center mb-1" style="height: 120px;">
                                <div class="order-details d-flex align-items-center">
                                    <img class="img-fluid object-cover"
                                        src="{{ request()->getSchemeAndHttpHost() . '/storage/' . $orderItem->publication->cover_image }}"
                                        alt="Product Image" width="90px" height="120px">
                                </div>
                                <div class="order-details d-flex flex-column justify-content-center">
                                    <h5 class="my-0"><strong>{{ $orderItem->publication->title }}</strong></h5>
                                    <small class="text-muted">{{ $orderItem->quantity }} item(s) x Rp
                                        {{ number_format($orderItem->publication->price, 0, ',', '.') }}</small>
                        @endif
                    @endforeach
                    @if ($order->orderItem->count() > 1)
                        <small class="text-muted">+{{ $order->orderItem->count() - 1 }} more items</small>
                    @endif
                </div>

                <div class="order-details mr-5">
                    <h6 class="my-0">Shopping Total</h6>
                    <strong class="text-muted">Rp
                        {{ number_format($order->gross_amount, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>
</div>
<div class="card-footer">
    <span class="float-right">
        <a href="javascript:void(0)" type="button" class="btn btn-success btn-min-width btn-sm"
            wire:click="showTransaction({{ $order->id }})">Show Transaction</a>
    </span>
</div>
</div>
@empty
<p>No transactions found.</p>
@endforelse

<!-- Livewire Pagination Links -->
<div class="d-flex justify-content-center mt-3">
    {{ $orders->links() }} <!-- Menampilkan pagination -->
</div>

<!-- Modal Detail Transaction -->
@if ($selectedOrder)
    <div class="modal fade text-left show" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
        style="display: block; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success white">
                    <h4 class="modal-title white" id="myModalLabel9"><i class="la la-tree"></i> Transaction Detail</h4>
                    <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Transaction #INV/20241113/{{ $selectedOrder->id }}</h6>
                    <p>Status: {{ ucwords($selectedOrder->status) }}</p>
                    <ul>
                        @foreach ($selectedOrder->orderItem as $orderItem)
                            <li>
                                <strong>{{ $orderItem->publication->title }}</strong>
                                ({{ $orderItem->quantity }} items)
                                - Rp
                                {{ number_format($orderItem->publication->price, 0, ',', '.') }}
                            </li>
                        @endforeach
                    </ul>
                    <h6>Total: <strong>Rp {{ number_format($selectedOrder->gross_amount, 0, ',', '.') }}</strong></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

</div>
