<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container d-flex align-items-center">
        <!-- Logo dan Brand -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
            <img src="{{ asset('/assets/frontsite/assets/img/logo-iesta.png') }}" alt="IESTA Logo" width="60"
                height="60">
            <div class="ms-2" style="font-size: 2.25rem; font-weight: bold;">IESTA</div>
        </a>

        <!-- Toggler for mobile view -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
            aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Collapse container -->
        <div class="collapse navbar-collapse mt-2" id="navbarDefault">
            <div class="d-lg-flex w-100 justify-content-between">
                <!-- Menu utama di tengah pada desktop, start pada mobile -->
                <ul class="navbar-nav mx-auto d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
                    <li class="nav-item"><a class="nav-link scrollto" href="{{ route('index') }}#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link scrollto" href="{{ route('index') }}#society">Society</a>
                    </li>
                    <li class="nav-item"><a class="nav-link scrollto"
                            href="{{ route('index') }}#membership">Membership</a></li>
                    <li class="nav-item"><a class="nav-link scrollto" href="{{ route('index') }}#service">Service</a>
                    </li>
                    <li class="nav-item"><a class="nav-link scrollto" href="{{ route('index') }}#contact">Contact</a>
                    </li>
                    <li class="nav-item"><a class="nav-link scrollto"
                            href="{{ route('publication.index') }}">Publication</a>
                    </li>
                </ul>

                <!-- Keranjang dan Nama User di kanan pada desktop, start pada mobile -->
                <ul
                    class="navbar-nav d-flex flex-column flex-lg-row align-items-start align-items-lg-center mt-3 mt-lg-0">
                    <!-- Keranjang -->
                    @auth
                        @if (Auth::user()->role_user && Auth::user()->role_user->role_id === 1)
                            <li class="nav-item d-flex align-items-center">
                                @livewire('frontsite.cart-menu')
                            </li>
                        @endif
                    @endauth

                    <!-- Login / User Name -->
                    @guest
                        <li class="d-flex align-items-center">
                            <a class="btn btn-outline-success" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="avatar avatar-online">
                                    <img src="{{ Auth::user()->profile_photo_path ? Auth::user()->profile_photo_path : Auth::user()->profile_photo_url }}"
                                        alt="avatar" style="width: 40px; height: 40px; border-radius: 50%;">
                                </span>
                                <span style="font-size: 0.85rem; font-weight: 600; margin-left: 10px;">
                                    {{ Auth::user()->name }}
                                </span>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item"
                                        href="
                                        {{ Auth::user()->role_user && Auth::user()->role_user->role_id === 1
                                            ? route('customer.dashboard.index')
                                            : (Auth::user()->role_user && Auth::user()->role_user->role_id === 2
                                                ? route('admin.dashboard.index')
                                                : route('backsite.dashboard.index')) }}
                                    ">
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 if (document.body.contains(document.getElementById('logout-form'))) {
                                                     document.getElementById('logout-form').submit();
                                                 } else {
                                                     alert('Session expired. Please refresh the page and try again.');
                                                 }">
                                        Logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- End Header/Navbar -->

@push('after-script')
    <script>
        // JavaScript untuk mengganti tampilan keranjang
        function updateCartDisplay() {
            const cartIcon = document.getElementById('cart-icon');
            const cartText = document.getElementById('cart-text');
            const cartBadge = document.getElementById('cart-badge');

            if (window.innerWidth < 576) { // Jika ukuran layar lebih kecil dari 576px
                cartIcon.style.display = 'none'; // Sembunyikan ikon
                cartText.style.display = 'inline'; // Tampilkan teks
                cartBadge.style.display = 'inline'; // Tampilkan badge
                cartBadge.classList.remove('translate-middle'); // Hapus kelas translate-middle
            } else {
                cartIcon.style.display = 'inline'; // Tampilkan ikon
                cartText.style.display = 'none'; // Sembunyikan teks
                cartBadge.style.display = 'inline'; // Sembunyikan badge pada desktop
            }
        }

        // Tambahkan event listener untuk resize
        window.addEventListener('resize', updateCartDisplay);

        // Panggil fungsi saat halaman dimuat
        window.addEventListener('load', updateCartDisplay);
    </script>
@endpush
