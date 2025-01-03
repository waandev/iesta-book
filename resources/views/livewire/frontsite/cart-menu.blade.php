<div>
    <a class="nav-link position-relative d-flex align-items-center" href="{{ route('customer.cart.index') }}">
        <i id="cart-icon" class="bi bi-cart" style="font-size: 1.25rem;"></i>
        <span id="cart-text">Cart</span>
        <span id="cart-badge" class="position-absolute start-100 translate-middle badge rounded-pill bg-danger"
            style="font-size: 0.75rem; padding: 0.25em 0.5em;">
            {{ $cartCount }}
        </span>
    </a>
</div>
