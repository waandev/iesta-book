<div>
    <div>
        @if (session()->has('success'))
            <script>
                toast('{{ session('success') }}', 'success');
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                toast('{{ session('error') }}', 'error');
            </script>
        @endif
    </div>

    <div class="card-no-transition-body-a mt-2">
        <div class="price-box d-flex justify-content-center">
            <a href="#" wire:click="addToCart()"
                class="card-no-transition-cart-button d-flex align-items-center justify-content-center">
                <span>Add to Cart</span>
            </a>
        </div>
    </div>
</div>
