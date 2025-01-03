<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    @include('includes.backsite.meta')

    <title>@yield('title') | IESTA</title>

    <link rel="apple-touch-icon" href="{{ asset('/assets/frontsite/assets/img/logo-iesta.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/frontsite/assets/img/logo-iesta.png') }}">
    <link
        href="{{ url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700') }}"
        rel="stylesheet">

    @stack('before-style')
    @include('includes.backsite.style')
    @stack('after-style')

    <!-- Styles -->
    @livewireStyles

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
</head>

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">

    @include('sweetalert::alert')

    @include('components.backsite.header')
    @include('components.backsite.menu')
    @yield('content')
    @include('components.backsite.footer')

    @stack('before-script')
    @include('includes.backsite.script')
    @stack('after-script')

    <!-- Script -->
    @livewireScripts
</body>

</html>
