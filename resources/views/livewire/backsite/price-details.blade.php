<div class="col-lg-6 col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Price Details</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="price-detail">
                    Price ({{ $totalItems }} items)
                    <span class="float-right">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                </div>
                <hr>
                <div class="price-detail">
                    Payable Amount
                    <span class="float-right">Rp {{ number_format($payableAmount, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
