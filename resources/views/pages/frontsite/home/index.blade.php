@extends('layouts.default')

@section('title', 'Home')

@section('content')
    @livewire('frontsite.intro')

    <main id="main" class="p-3">
        @livewire('frontsite.home-section')

        @livewire('frontsite.society-section')

        @livewire('frontsite.membership-section')

        @livewire('frontsite.service-section')

        @livewire('frontsite.contact-section')

    </main><!-- End #main -->
@endsection

@push('after-script')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Smooth Scroll and Active Navbar -->
    <script>
        $(document).ready(function() {
            // Smooth scrolling for all links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                }
            });

            // Add active class to navbar items on scroll
            $(window).on('scroll', function() {
                $('section').each(function() {
                    if ($(window).scrollTop() >= $(this).offset().top - 100) {
                        var id = $(this).attr('id');
                        $('.nav-item').removeClass('active');
                        $('.nav-item a[href="#' + id + '"]').parent().addClass('active');
                    }
                });
            });

            // Add active class to clicked navbar item
            $('.nav-item').on('click', function() {
                $('.nav-item').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('NOCAPTCHA_SITEKEY') }}"></script>
    <script>
        // Fungsi untuk mendapatkan token reCAPTCHA
        function getRecaptchaToken(action, responseElementId, form) {
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ env('NOCAPTCHA_SITEKEY') }}', {
                    action: action
                }).then(function(token) {
                    document.getElementById(responseElementId).value = token;
                    form.submit(); // Kirim form setelah token didapat
                });
            });
        }

        // Menangani pengiriman membership form
        document.getElementById('membership-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form
            getRecaptchaToken('membership_form', 'g-recaptcha-response-membership', this);
        });

        // Menangani pengiriman service form
        document.getElementById('service-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form
            getRecaptchaToken('service_form', 'g-recaptcha-response-service', this);
        });
    </script>
@endpush
