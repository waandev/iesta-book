<div>
    @if ($method === 'pickup')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Pick Up Address</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="card-text">
                        <p>You can pick up your items at one of the following locations:</p>
                        <ul>
                            <li><strong>Jl. KH. Wahid Hasyim No. 246</strong>, Sungguminasa, Gowa, South Sulawesi</li>
                            <li><strong>Electronics and Devices Laboratory</strong>, Department of Electrical
                                Engineering,
                                Faculty of Engineering, Hasanuddin University, Jl. Malino Km. 6, Romang Lompoa,
                                Bontomarannu, Gowa, South Sulawesi</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    @elseif ($method === 'delivery')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Delivery Address</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @if (!$hasAddress)
                        <p>You have not added a delivery address yet.</p>
                        <button wire:click="$set('showModal', true)" class="btn btn-outline-secondary btn-sm">Add
                            Address</button>
                    @else
                        <div class="card-text">
                            <p>
                                <i class="la la-map-marker text-primary"></i>
                                <strong> {{ $label }} - {{ $recipientName }}</strong>
                            </p>
                            <p>{{ $fullAddress }}, {{ $cityName }}, {{ $provinceName }}, {{ $phoneNumber }}</p>
                        </div>

                        <button class="btn btn-outline-secondary btn-sm mb-1">Change
                            Address</button>

                        <div class="form-group mt-1">
                            <label for="courier">Select Courier</label>
                            <select wire:model.live="selectedCourier" class="form-control">
                                <option value="" disabled selected>Select Courier</option>
                                @foreach ($couriers as $code => $title)
                                    <option value="{{ $code }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($shippingCost)
                            <h5>Available Shipping Options:</h5>
                            <select name="selectedShippingOption" wire:model.live="selectedShippingOption"
                                class="form-control">
                                <option value="">Select a shipping option</option>
                                @foreach ($shippingCost as $cost)
                                    <option value="{{ $cost['service'] }}">
                                        {{ $cost['service'] }} - Estimated:
                                        {{ $cost['estimated_time'] }} days (Rp
                                        {{ number_format($cost['cost'], 0, ',', '.') }})
                                    </option>)
                                @endforeach
                            </select>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @else
        <p>Please select a purchase method first.</p>
    @endif

    <!-- Modal for adding address -->
    <div class="modal fade @if ($showModal) show @endif"
        style="display: @if ($showModal) block @else none @endif;" tabindex="-1" role="dialog"
        aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 500px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Address</h5>
                    <button type="button" class="close" wire:click="$set('showModal', false)">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 700px; overflow-y: auto;">
                    <form wire:submit.prevent="addAddress">
                        <!-- Recipient Name -->
                        <div class="form-group">
                            <label for="recipientName">Recipient Name</label>
                            <input type="text" wire:model="recipientName" id="recipientName" class="form-control"
                                required>
                            @error('recipientName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="number" wire:model="phoneNumber" id="phoneNumber" class="form-control"
                                required placeholder="6281234567890">
                            @error('phoneNumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Label -->
                        <div class="form-group">
                            <label for="label">Label</label>
                            <input type="text" wire:model="label" id="label" class="form-control" required
                                placeholder="Example: House, Rental, Office, etc.">
                            @error('label')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Province -->
                        <div class="form-group">
                            <label for="province">Province</label>
                            <select wire:model.live="selectedProvince" id="province" class="form-control" required>
                                <option value="">Select Province</option>
                                @foreach ($provinces as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('selectedProvince')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- City -->
                        <div class="form-group">
                            <label for="city">City</label>
                            <select wire:model.live="selectedCity" id="city" class="form-control" required>
                                <option value="">Select City</option>
                                @foreach ($cities as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Full Address -->
                        <div class="form-group">
                            <label for="fullAddress">Full Address</label>
                            <textarea wire:model="fullAddress" id="fullAddress" class="form-control" required></textarea>
                            @error('fullAddress')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Set as Primary Address Checkbox -->
                        <div class="form-group form-check">
                            <input type="checkbox" wire:model="setAsPrimary" id="setAsPrimary" class="form-check-input">
                            <label for="setAsPrimary" class="form-check-label">Set as Primary Address</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for modal -->
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
