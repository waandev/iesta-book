<div>
    <div class="d-flex justify-content-between">
        <span>Total Price ({{ $totalQuantity }} Items)</span>
        <strong>Rp {{ number_format($totalPrice, 0, ',', '.') }}</strong>
    </div>
    <div class="d-flex justify-content-between">
        <span>Total Delivery Fee</span>
        <strong>Rp
            {{ number_format($selectedShippingOption['cost'] ?? 0, 0, ',', '.') }}
        </strong>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <span>Shopping Total</span>
        <strong>Rp
            {{ number_format($shoppingTotal, 0, ',', '.') }}
        </strong>
    </div>
</div>
