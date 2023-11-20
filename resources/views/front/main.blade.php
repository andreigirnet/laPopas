@extends('welcome')
@section('content')
    @include('includes/banner')
    <section class="homeProductsSection" >
        <div class="homeProductsWrapper">
            <div class="homeCategoriesMenu">
                <div class="fixedMenu" id="fixedMenu">
                    <div class="homeCategoriesMenuTitle" x-text="data.navMenu.category"></div>
                    <div class="listCategories">
                        <template x-for="(item, key) in data.products">
                            <div>
                            <a x-bind:href="'#' + key" class="clearLink">
                                <div class="fixedMenuItem">
                                    <p class="homeCategory" x-text="key"></p>
                                    <img src="{{asset('images/icons/rightArrowYellow.png')}}" class="rightArrowMenu secondArrowMenu" alt="">
                                </div>
                            </a>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="homeProductsItems">
                <div class="categoryWrap">
                    <template  x-for="(item, key) in data.products" x-bind:key="key">
                        <div class="homeProductsCategory">
                            <div class="titleContent">
                                <img src="{{asset('images/icons/catalogIcon.png')}}" class="logoCategory" alt="">
                                <div x-text="key" :id="key" class="titleCategoryProducts"></div>
                            </div>
                            <div class="products">
                                <template x-for="(product, productKey) in item" x-bind:key="productKey">
                                    <!-- Display product information here -->
                                    <a :href="'/product/' + findIndexByKey(data.products, key) + '/' + findIndexByKey(data.products[key], productKey)" class="clearLink">
                                    <div class="productCard">
                                            <div class="productStateHeader">
                                                <div x-text="product.state" class="productState"></div>
                                                <img src="{{asset('images/icons/frost.svg')}}" class="frozenIcon" alt="" x-show="product.state === 'Frozen product' || product.state === 'Produs congelat' || product.state === 'Замороженный продукт'">
                                                <img src="{{asset('images/icons/ready-product.svg')}}" class="frozenIcon"  alt="" x-show="product.state === 'Cooked Product' || product.state === 'Produs gătit' || product.state === 'Готовый продукт'">
                                            </div>
                                            <img :src="product.images[0]" class="productImg" alt="">
                                            <div x-text="productKey" class="productTitle"></div>
                                            <div class="lineContainer" x-show="product.id !== 118">
                                                <div class="productLine"></div>
                                            </div>
                                            <div class="priceContainer" x-show="product.id !== 118">
                                                <template x-if="!product.bulkPrice">
                                                <div class="priceFull">
                                                    <div class="price" x-text="product.price"></div>
                                                    <div class="price">€</div>
                                                </div>
                                                </template>
                                                <form action="{{route('basket.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="name" :value="productKey">
                                                    <input type="hidden" name="state" :value="product.state">
                                                    <input type="hidden" name="russian" :value="allLangData.ru.products[key].find(item => product.id === id).name">
                                                    <input type="hidden" name="id" :value="product.id">
                                                    <input type="hidden" name="price" :value="product.price">
                                                    <input type="hidden" name="image" :value="product.images[0]">
                                                    <template x-if="!product.bulkPrice">
                                                        <button class="cartAddProductContainer" type="submit" x-on:mouseenter="cartHovered = productKey" x-on:mouseleave="cartHovered = null">
                                                            <img :src="cartHovered === productKey ? cartPath[1] : cartPath[0]" class="cartImgProduct" alt="">
                                                            <div class="" x-text="product.cart"></div>
                                                        </button>
                                                    </template>
                                                    <template x-if="product.bulkPrice">
                                                        <p class="detailsButton" x-text="data.body.details"></p>
                                                    </template>
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- You can add more details about each product -->
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
@endsection
