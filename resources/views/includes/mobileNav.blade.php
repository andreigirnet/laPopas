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
        <div class="country">Ireland</div>
    </div>
    <ul>
        <li class="has-dropdown">
            <a href="#" class="submenu-toggle"><span x-text="data.navMenu.items[0]"></span> <span class="arrow-down"></span></a>
            <ul class="submenu">
                <template x-for="(item, key) in data.products">
                    <li class="submenu-item"><a :href="'#' + key" x-text="key"></a></li>
                </template>

            </ul>
        </li>
        <li><a href="#" x-text="data.navMenu.items[1]"></a></li>
        <li><a href="#" x-text="data.navMenu.items[2]"></a></li>
    </ul>
</nav>
