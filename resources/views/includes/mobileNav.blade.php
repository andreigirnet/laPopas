<div class="menu-toggle">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
<nav class="mobile-menu">
    <div class="languagesMobile">
        <div class="languageItem" :class="currentLanguage === 'en' ? 'upperMenuActiveMobile' : ''" x-on:click="chooseLanguage('en')">En</div>
        <div class="separator">|</div>
        <div class="languageItem" :class="currentLanguage === 'ru' ? 'upperMenuActiveMobile' : ''" x-on:click="chooseLanguage('ru')">Ru</div>
        <div class="separator">|</div>
        <div class="languageItem" :class="currentLanguage === 'ro' ? 'upperMenuActiveMobile' : ''" x-on:click="chooseLanguage('ro')">Ro</div>
        <div class="separator">|</div>
    </div>
    <div class="loginButtonMain">
        @if (Route::has('login'))

            @auth
                <form action="/logout" method="POST">@csrf<button type="submit" class="logOutButton">Logout /</button></form>
                <a href="{{ url('/dashboard') }}" class="login clearLink">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="login clearLink" x-text="data.upperMenu.loginButton"></a>
                {{--                                @if (Route::has('register'))--}}
                {{--                                    <a href="{{ route('register') }}" class="login">Register</a>--}}
                {{--                                @endif--}}
            @endauth

        @endif
    </div>
    <ul>
        @if(request()->is('/'))
        <li class="has-dropdown">
            <a href="#" class="submenu-toggle"><span x-text="data.navMenu.items[0]"></span> <span class="arrow-down"></span></a>
            <ul class="submenu">
                <template x-for="(item, key) in data.products">
                    <li class="submenu-item"><a :href="'#' + key" x-text="key"></a></li>
                </template>

            </ul>
        </li>
        @else
            <a href="/" class="clearLink" style="color: white">Menu</a>
        @endif
        <li><a href="/service" x-text="data.navMenu.items[1]"></a></li>
        <li><a href="/contacts" x-text="data.navMenu.items[2]"></a></li>
        <li><a href="{{route('news')}}" x-text="data.navMenu.items[3]"></a></li>
    </ul>
</nav>
