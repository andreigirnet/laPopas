<div class="menu-toggle">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
<nav class="mobile-menu">
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
