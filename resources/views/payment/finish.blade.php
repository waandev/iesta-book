<!-- resources/views/payment/finish.blade.php -->

<div class="finish-payment-container">
    <h2>Payment Status</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @else
        <div class="alert alert-info">
            Your payment is still being processed. Please wait for confirmation.
        </div>
    @endif

    <a href="{{ route('customer.dashboard.index') }}" class="btn btn-primary">Go to Dashboard</a>
</div>
