{{--<section class="mainBannerSection">--}}
{{--    <div class="bannerWrapper">--}}
{{--        <img src="{{asset('images/arrows/slider-prev.svg')}}" id="prevArrow" class="prevArrow" alt="">--}}
{{--        <div class="innerBanner" id="innerBanner">--}}
{{--            <img class="slide" src="{{asset('images/banner/banner1.jpg')}}">--}}
{{--            <img class="slide" src="{{asset('images/banner/banner2.jpg')}}">--}}
{{--            <img class="slide" src="{{asset('images/banner/banner3.jpg')}}">--}}
{{--            <img class="slide" src="{{asset('images/banner/banner4.jpg')}}">--}}
{{--        </div>--}}
{{--        <img src="{{asset('images/arrows/slider-next.svg')}}" id="nextArrow"  class="nextArrow" alt="">--}}
{{--    </div>--}}
{{--</section>--}}
<!-- Slider main container -->
<div class="swiperMobileNone">
<div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <img class="swiper-slide" src="{{asset('images/banner/banner1.jpg')}}" alt="">
        <img class="swiper-slide" src="{{asset('images/banner/banner2.jpg')}}" alt="">
        <img class="swiper-slide" src="{{asset('images/banner/banner3.jpg')}}" alt="">
        <img class="swiper-slide" src="{{asset('images/banner/banner4.jpg')}}" alt="">
    </div>
    <!-- If we need pagination -->
{{--    <div class="swiper-pagination"></div>--}}

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
</div>
</div>
