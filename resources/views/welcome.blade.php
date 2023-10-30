<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="authenticity_token" name="csrf-param" />
        <meta content="{{@csrf_token()}}=" name="csrf-token" />
        <title>La Popas</title>
        <link rel="stylesheet" href="{{asset('css/frontMain.css')}}">
        <link rel="stylesheet" href="{{asset('css/cart.css')}}">
        <link href="https://fonts.cdnfonts.com/css/museo-sans-rounded" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/checkout.css')}}">
        <link rel="stylesheet" href="{{asset('css/service.css')}}">
        <link rel="stylesheet" href="{{asset('css/product.css')}}">
        <link rel="stylesheet" href="{{asset('css/dash.css')}}">
        <link href="https://fonts.cdnfonts.com/css/noir" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    </head>
    <body x-data="app()">
       @include('includes/nav')

       @yield('content')


        <section class="infoSection">
            <div class="infoContainer">
                <div class="info">
                    <div class="infoTitle">Delivery</div>
                    <div class="infoContent">In town 3 euro</div>
                    <div class="infoContent">Outside 2 euro</div>
                    <img src="{{asset('images/icons/domik-delivery.png')}}" class="domik" alt="">
                </div>
                <div class="hrDiv"></div>
                <div class="info">
                    <div class="infoTitle">How you Order?</div>
                    <div class="infoContent">079776698</div>
                    <div class="infoContent">079776698</div>
                    <div class="infoContent">www.x.md</div>
                </div>
                <div class="hrDiv"></div>
                <div class="info">
                    <div class="infoTitle">Payment Methods</div>
                    <div class="infoContent">Cash when you reveice the order</div>
                    <div class="infoContent">By card(Visa, MasterCard)</div>
                </div>
                <div class="hrDiv"></div>
                <div class="info">
                    <div class="infoTitle">Time Of Delivery</div>
                    <div class="infoContent">In aceeasi zi</div>
                    <div class="infoContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dignissimos fugiat libero nobis, pariatur quo ullam vero. maxime moptio quasi.</div>
                </div>
            </div>
        </section>
        <section class="footerSection">
            <div class="footerContainer">
                <img src="{{asset('images/icons/catalog-icon.svg')}}" alt="">
                <div class="footerSlogan">Deliver fast and convenient</div>
                <div class="footerMenu">
                    <div class="footerMenuRow">
                        <div class="footerMenuElement">Menu</div>
                        <div class="footerMenuElement">Contacts</div>
                        <div class="footerMenuElement">Delivery</div>
                    </div>
                    <div class="footerMenuRow">
                        <div class="footerMenuElement">Corporative</div>
                        <div class="footerMenuElement">Contacts</div>
                    </div>
                    <div class="footerMenuRow">
                        <div class="footerMenuElement">Rules</div>
                    </div>
                    <div class="footerMenuRow">
                        <div class="footerMenuElement">Politics and Confidentiality</div>
                    </div>
                </div>
                <div class="footerSocial">
                    <img src="{{asset('images/social/fb-w.png')}}" alt="">
                    <img src="{{asset('images/social/inst-w.png')}}" alt="">
                    <img src="{{asset('images/social/tik-w.png')}}" alt="">
                </div>
            </div>
        </section>
        <script src="{{asset('js/front.js')}}"></script>
        <script src="{{asset('js/banner.js')}}"></script>
{{--        <script src="{{asset('js/scroll.js')}}"></script>--}}
{{--       <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>--}}
       <script type="module">
           import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

           const swiper = new Swiper('.swiper', {
               // Optional parameters
               direction: 'horizontal',
               loop: true,

               // If we need pagination
               // pagination: {
               //     el: '.swiper-pagination',
               // },

               // Navigation arrows
               navigation: {
                   nextEl: '.swiper-button-next',
                   prevEl: '.swiper-button-prev',
               },

               // And if we need scrollbar
               // scrollbar: {
               //     el: '.swiper-scrollbar',
               // },
           });
       </script>
       <script src="https://js.stripe.com/v3/"></script>
       <script src="{{asset('js/stripe.js')}}"></script>
    </body>
</html>
