<section class="upperNav">
    <div class="upperNavWrapper">
        <div class="leftUpperNav">
            <div class="languages">
                <div class="languageItem" :class="currentLanguage === 'en' ? 'upperMenuActive' : ''" x-on:click="chooseLanguage('en')">En</div>
                <div class="separator">|</div>
                <div class="languageItem" :class="currentLanguage === 'ru' ? 'upperMenuActive' : ''" x-on:click="chooseLanguage('ru')">Ru</div>
                <div class="separator">|</div>
                <div class="languageItem" :class="currentLanguage === 'ro' ? 'upperMenuActive' : ''" x-on:click="chooseLanguage('ro')">Ro</div>
                <div class="separator">|</div>
                <div class="country">Ireland</div>
            </div>
            <div class="social">
                <a href=""><img src="{{asset('images/social/inst.png')}}" alt=""></a>
                <a href=""><img src="{{asset('images/social/fb.png')}}" alt=""></a>
                <a href=""><img src="{{asset('images/social/tik.png')}}" alt=""></a>
            </div>
        </div>
        <div class="rightUpperNav">
            <div class="loginButtonMain">
                @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}" class="login">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login" x-text="data.upperMenu.loginButton"></a>
                        {{--                                @if (Route::has('register'))--}}
                        {{--                                    <a href="{{ route('register') }}" class="login">Register</a>--}}
                        {{--                                @endif--}}
                    @endauth

                @endif
            </div>
            <div class="smallCartUpper">
                <img src="{{asset('images/cart/cart-header.png')}}" class="cartUpper" alt="">
                <div class="smallCartText" x-text="data.upperMenu.orderWord">:</div>
                <div class="smallOrderAmount">{{Cart::total()}}</div>
                <div class="smallCartCurrency">euro</div>
            </div>
        </div>
    </div>
</section>
<section class="mainMenu">
    <div class="mainMenuWrapper">
        <div class="leftMainMenu">
            <div class="subCategoryMenu" id="menuDrop">
                <div x-text="data.navMenu.items[0]"  class="menuItem"></div>
                <div class="subMenu">
                    <template x-for="(item, key) in data.products">
                        <div class="submenuItem">
                            <a x-text="key" href="/" class="sumbmenuItemKey"></a>
                            <img class="rightArrowMenu" src="{{asset('images/icons/rightArrowYellow.png')}}" alt="">
                        </div>
                    </template>
                </div>
            </div>
            <div x-text="data.navMenu.items[1]" class="menuItem"></div>
            <div class="subCategoryMenu" id="menuDrop">
                <div x-text="data.navMenu.items[2]" class="menuItem"></div>
                <div class="subMenu">
                    <div class="submenuItem">
                        <a x-text="data.navMenu.aboutUs[0]" href="/" class="sumbmenuItemKey"></a>
                        <img class="rightArrowMenu" src="{{asset('images/icons/rightArrowYellow.png')}}" alt="">
                    </div>
                    <div class="submenuItem">
                        <a x-text="data.navMenu.aboutUs[1]" href="/" class="sumbmenuItemKey"></a>
                        <img class="rightArrowMenu" src="{{asset('images/icons/rightArrowYellow.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div x-text="data.navMenu.items[3]" class="menuItem"></div>

        </div>
        <div class="centerMainMenu"><img src="{{asset('images/logo/Logo.png')}}" alt=""></div>
        <div class="rightMainMenu">
            <div class="imgPhoneDial"><img src="{{asset('images/icons/Phone_Icon.png')}}" alt=""></div>
            <div class="mainMenuContent">
                <div class="upperMainMenuContent"><span x-text="data.navMenu.fromTo[0]" class="whiteText"></span><span class="time">08.00</span><span x-text="data.navMenu.fromTo[1]" class="whiteText"></span><span  class="time">22.00</span><span x-text="data.navMenu.fromTo[2]" class="whiteText"></span></div>
                <div class="lowerMainMenuContent"><span class="preNumber">022</span><span class="tel">264-600</span></div>
            </div>
        </div>
    </div>
</section>
