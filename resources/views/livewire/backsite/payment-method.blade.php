<div>
    <div class="card-content">
        <div class="card-body">

            <ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#active32" aria-controls="active32"
                        aria-expanded="true">Manual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="link-tab32" data-toggle="tab" href="#link32" aria-controls="link32"
                        aria-expanded="false">Automatic</a>
                </li>
            </ul>

            <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane active" id="active32" aria-labelledby="active-tab32"
                    aria-expanded="true">
                    <h4 class="card-title">Manual Transfer</h4>
                    <div class="card-text">
                        <img class="brand-logo mx-auto d-block text-center mt-3"
                            src="{{ asset('/assets/backsite/app-assets/images/logo/logo-bni.svg') }}" alt="BRI Logo"
                            width="50%">
                        <p class="mt-3">
                            You can transfer to the BNI account number
                            <strong>6676992195</strong> on behalf of
                            <strong>PT Minasa Elektro Sains Teknologi</strong>. After that, please submit your payment
                            receipt through the 'Pay Now' button below.
                        </p>
                        <button type="button" class="btn btn-primary btn-block mt-3"
                            wire:click="$set('showModal', true)">
                            Pay Now
                        </button>
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane" id="link32" aria-labelledby="link-tab32" aria-expanded="false">


                    <h4 class="card-title">Pay with Midtrans</h4>

                    @livewire('backsite.midtrans-payment', ['shoppingTotal' => $shoppingTotal])
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Manual Payment -->
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
                    <div class="mb-3 p-2 bg-light border rounded">
                        <h6 class="font-weight-bold">Payment Instructions</h6>
                        <p>Please transfer the total amount of:</p>
                        <p><strong>Rp {{ number_format($shoppingTotal, 0, ',', '.') }}</strong></p>
                        <p>to the following bank account:</p>
                        <ul class="list-unstyled">
                            <li>Bank: <strong>BRI</strong></li>
                            <li>Account Number: <strong>0403-0102-5770-50-9</strong></li>
                        </ul>
                        <p>Once the transfer is complete, please upload your payment proof below to confirm your
                            transaction.</p>
                    </div>

                    <form wire:submit.prevent="submitPaymentProof" enctype="multipart/form-data">
                        <!-- Sender's Name -->
                        <div class="form-group">
                            <label for="senderName">Sender's Name</label>
                            <input type="text" wire:model="senderName" id="senderName" class="form-control" required>
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

    <!-- Overlay for Modal -->
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
