<div>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <!-- Tombol untuk memulai pembayaran -->
    <button id="payButton" class="btn btn-primary btn-block" data-snap-token="{{ $snapToken }}" wire:click='saveOrder'
        wire:loading.attr="disabled">
        Pay Now
    </button>

    <script>
        var payButton = document.getElementById('payButton');

        // Event listener untuk tombol klik
        payButton.addEventListener('click', function(event) {
            // Ambil nilai token dari atribut data-snap-token tombol
            var snapToken = payButton.getAttribute('data-snap-token');

            // Pastikan token ada sebelum melanjutkan
            if (!snapToken) {
                alert('Snap token not available!');
                return;
            }

            // Nonaktifkan tombol agar tidak bisa di-click lagi
            payButton.disabled = true;

            // Proses pembayaran dengan Snap token
            snap.pay(snapToken, {
                onSuccess: function(result) {
                    alert("Payment success!");
                    window.location.href = "{{ route('customer.dashboard.index') }}";
                },
                onPending: function(result) {
                    alert("Payment is pending.");
                    window.location.href = "{{ route('customer.dashboard.index') }}";
                },
                onError: function(result) {
                    alert("Payment failed.");
                    window.location.href = "{{ route('customer.dashboard.index') }}";
                },
                onClose: function() {
                    alert("You closed the payment popup!");
                    window.location.href = "{{ route('customer.dashboard.index') }}";
                }
            });
        });
    </script>
</div>
