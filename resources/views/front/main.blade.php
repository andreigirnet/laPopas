@extends('welcome')
@section('content')
    @include('includes/banner')
    <section class="homeProductsSection" >
        <div class="homeProductsWrapper">
            <div class="homeCategoriesMenu">
                <div class="fixedMenu" id="fixedMenu">
                    <div class="homeCategoriesMenuTitle">Categories</div>
                    <div class="listCategories">
                        <template x-for="(item, key) in data.products">
                            <div class="fixedMenuItem">
                                <a class="homeCategory" x-text="key"></a>
                                <img src="{{asset('images/icons/rightArrowYellow.png')}}" class="rightArrowMenu secondArrowMenu" alt="">
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
                                <img src="{{asset('images/icons/catalog-icon.svg')}}" class="logoCategory" alt="">
                                <div x-text="key" class="titleCategoryProducts"></div>
                            </div>
                            <div class="products">
                                <template x-for="(product, productKey) in item" x-bind:key="productKey">
                                    <!-- Display product information here -->
                                    <div class="productCard" x-on:mouseenter="hoveredProduct = productKey" x-on:mouseleave="hoveredProduct = null">
                                        <div x-text="product.state" class="productState"></div>
                                        <img :src="hoveredProduct === productKey ? product.images[1] : product.images[0]" class="productImg" alt="">
                                        <div x-text="productKey" class="productTitle"></div>
                                        <div class="lineContainer">
                                            <div class="productLine"></div>
                                        </div>
                                        <div class="priceContainer">
                                            <div class="priceFull">
                                                <div class="price" x-text="product.price"></div>
                                                <div class="price">Euro</div>
                                            </div>
                                            <form action="{{route('basket.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="name" :value="productKey">
                                                <input type="hidden" name="id" :value="product.id">
                                                <input type="hidden" name="price" :value="product.price">
                                                <input type="hidden" name="image" :value="product.images[0]">
                                                <button class="cartAddProductContainer" type="submit" x-on:mouseenter="cartHovered = productKey" x-on:mouseleave="cartHovered = null">
                                                    <img :src="cartHovered === productKey ? cartPath[1] : cartPath[0]" class="cartImgProduct" alt="">
                                                    <div class="" x-text="product.cart"></div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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
