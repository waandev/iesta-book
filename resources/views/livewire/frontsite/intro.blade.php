<div class="intro intro-carousel swiper position-relative">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="swiper-slide carousel-item-a intro-item bg-image"
                style="background-image: url({{ asset('assets/frontsite/assets/img/' . $slide) }});">
                <div class="overlay overlay-a"></div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
