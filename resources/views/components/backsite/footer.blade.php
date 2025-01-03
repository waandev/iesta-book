</div>
</div>
</div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
            class="float-md-left d-block d-md-inline-block">Copyright @php
                $currentYear = date('Y');
                $copyrightYear = $currentYear == 2023 ? '2024' : '2023 - ' . $currentYear;
                echo $copyrightYear;
            @endphp &copy; <a
                class="text-bold-800 grey darken-2" href="{{ route('index') }}">IESTA</a>. All Right
            Reserved.</span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <a
                href="https://waandev.com/">WaanDev</a><span id="scroll-top"></span></span>
    </p>
</footer>
<!-- END: Footer-->
