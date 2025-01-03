<div>
    @if ($method === 'manual')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Manual Transfer</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body"> <!-- text-center untuk menengahkan konten dalam card -->
                    <div class="card-text">
                        <!-- Gambar ditengah -->
                        <img class="brand-logo mx-auto d-block text-center" alt="modern admin logo"
                            src="{{ asset('/assets/backsite/app-assets/images/logo/logo_bri.png') }}" width="50%">

                        <p class="mt-3">You can transfer to the BRI account number
                            <strong>0403-0102-5770-50-9</strong> on
                            behalf of
                            <strong>Muhammad Aswan</strong>. After that, please submit your payment receipt through the
                            'Pay' button
                            below.
                        </p>
                    </div>

                    <!-- Tombol Pay untuk menampilkan modal -->
                    <button type="button" class="btn btn-primary btn-block mt-3" wire:click="$set('showModal', true)">
                        Pay
                    </button>
                </div>
            </div>
        </div>


        <div class="modal fade @if ($showModal) show @endif"
            style="display: @if ($showModal) block @else none @endif;" tabindex="-1" role="dialog"
            aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 500px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Manual Payment</h5>
                        <button type="button" class="close" wire:click="$set('showModal', false)">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="max-height: 700px; overflow-y: auto;">
                        <!-- Payment Instructions -->
                        <div class="mb-3 p-2 bg-light border rounded">
                            <h6 class="font-weight-bold">Payment Instructions</h6>
                            <p class="mb-1">Please transfer the total amount of:</p>
                            <p class="mb-1"><strong>Rp {{ number_format($shoppingTotal, 0, ',', '.') }}</strong></p>
                            <p class="mb-1">to the following bank account:</p>
                            <ul class="list-unstyled">
                                <li>Bank: <strong>BRI</strong></li>
                                <li>Account Number: <strong>0403-0102-5770-50-9</strong></li>
                            </ul>
                            <p class="mb-0">Once the transfer is complete, please upload your payment proof below to
                                confirm your transaction.</p>
                        </div>

                        <!-- Payment Proof Form -->
                        <form wire:submit.prevent="submitPaymentProof" enctype="multipart/form-data">
                            <!-- Sender's Name -->
                            <div class="form-group">
                                <label for="senderName">Sender's Name</label>
                                <input type="text" wire:model="senderName" id="senderName" class="form-control"
                                    required>
                                @error('senderName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Upload Transfer Proof -->
                            <div class="form-group">
                                <label for="transferProof">Upload Transfer Proof</label>
                                <input type="file" wire:model="transferProof" id="transferProof"
                                    class="form-control-file" required>
                                @error('transferProof')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Submit Payment Proof</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overlay for modal -->
        @if ($showModal)
            <div class="modal-backdrop fade show"></div>
        @endif
    @elseif ($method === 'automatic')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pay with Midtrans</h4>
            </div>
            <div class="card-content">
                <div class="card-body text-center">
                    @livewire('backsite.midtrans-payment')
                </div>
            </div>
        </div>
    @else
        <p>Please select a payment method first.</p>
    @endif

</div>
