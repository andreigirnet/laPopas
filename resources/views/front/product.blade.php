@extends('welcome')
@section('content')
    <div class="productContainer">
        <img :src="singleProduct.images[0]" alt="" class="productSingleImg">
        <div class="productInner">
            <div class="productSingleHeader">
                <div class="productSingleTitle" x-text="singleProduct['name']"></div>
                <div class="priceActionBox">
                    <div class="priceSingleItem">
                        <div style="font-weight: 600">Price: </div>
                        <template x-if="platouCheck(singleProduct['name'])">
                            <div>
                                <div class="singlePriceDigit" x-text="singleProduct.price"></div>
                            </div>
                        </template>
                        <template x-if="platouCheckShow(singleProduct['name'])">
                            <div>
                                <div class="singlePriceDigit" x-text="bulkPrice"></div>
                            </div>
                        </template>
                        <div class="Currency">€</div>
                    </div>
                    <form action="{{route('basket.store')}}" method="POST" id="singleProductForm">
                        @csrf
                        <input type="hidden" name="name" :value="singleProduct['name']">
                        <input type="hidden" name="id" :value="singleProduct.id">
                        <template x-if="platouCheck(singleProduct['name'])">
                        <div>
                            <input type="hidden" name="price" :value="singleProduct.price">
                        </div>
                        </template>
                        <template x-if="platouCheckShow(singleProduct['name'])">
                        <div>
                            <input type="hidden" name="price" x-model="bulkPrice">
                        </div>
                        </template>
                        <input type="hidden" name="image" :value="singleProduct.images[0]">
                        <template x-if="platouCheckShow(singleProduct['name'])">
                            <div class="custom-select">
                                <div class="select-label">
                                    <label for="sizeSelect">Mărime (grame):</label>
                                    <select id="sizeSelect" class="custom-select-dropdown" x-on:change="updatePrice($event.target.selectedIndex)">
                                        <option :value="singleProduct.size[0]" x-text="singleProduct.size[0]"></option>
                                        <option :value="singleProduct.size[1]" x-text="singleProduct.size[1]"></option>
                                    </select>
                                </div>
                            </div>
                        </template>
                        <button class="addToCartSingleButton">
                            <img src="{{asset('images/icons/cartSingle.png')}}" alt="">
                            <div>To Cart</div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="deliverySingleInfo">
                <template x-if="platouCheck(singleProduct['name'])">
                    <div>
                        <div class="deliverySingleText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam assumenda consequatur dolore dolorem ducimus eius expedita explicabo, inventore, ipsum molestiae nostrum numquam optio perferendis placeat saepe similique sit soluta tempora.</div>
                    </div>
                </template>
                <template x-if="platouCheckShow(singleProduct['name'])">
                    <div class="listContentPlatou">
                        <template x-for="item in singleProduct.content">
                            <div x-text="item"></div>
                        </template>
                    </div>
                </template>
                <template x-if="platouCheckShow(singleProduct['name'])">
                <div class="personNumber">
                    <div>For</div>
                    <div x-text="platouSize"></div>
                    <div>Persons</div>

                </div>
                </template>
            </div>
            <div class="singleItemLine"></div>
            <template x-if="platouCheck(singleProduct['name'])">
                <div>
                    <div class="nutritionalContainer" >
                        <div class="nutritionSection">
                            <div class="nutritionTitle" x-text="singlePageData.nutrition"></div>
                            <div class="nutritionItems">
                                <div class="nutritionItem">
                                    <div class="nutritionTop" x-text="singlePageData.protein"></div>
                                    <div class="nutritionBottom" >
                                        <div class="nutritionBottomValue" x-text="singleProduct.nutritiveValue.protein"></div>
                                        <div class="grams" x-text="singlePageData.grams"></div>
                                    </div>
                                </div>
                                <div class="nutritionItem">
                                    <div class="nutritionTop" x-text="singlePageData.fats"></div>
                                    <div class="nutritionBottom">
                                        <div class="nutritionBottomValue" x-text="singleProduct.nutritiveValue.fats"></div>
                                        <div class="grams" x-text="singlePageData.grams"></div>
                                    </div>
                                </div>
                                <div class="nutritionItem">
                                    <div class="nutritionTop" x-text="singlePageData.carbs"></div>
                                    <div class="nutritionBottom" >
                                        <div class="nutritionBottom">
                                            <div class="nutritionBottomValue" x-text="singleProduct.nutritiveValue.carboHydrates"></div>
                                            <div class="grams" x-text="singlePageData.grams"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="energySection">
                            <div class="nutritionTitle" x-text="singlePageData.energy"></div>
                            <div class="nutritionItems">
                                <div class="nutritionItem">
                                    <div class="nutritionTop">kcal</div>
                                    <div class="nutritionBottom">
                                        <div class="nutritionBottomValue" x-text="singleProduct.energyValue.kcal"></div>
                                        <div class="grams" x-text="singlePageData.grams"></div>
                                    </div>
                                </div>
                                <div class="nutritionItem">
                                    <div class="nutritionTop">kj</div>
                                    <div class="nutritionBottom" >
                                        <div class="nutritionBottom">
                                            <div class="nutritionBottomValue" x-text="singleProduct.energyValue.kj"></div>
                                            <div class="grams" x-text="singlePageData.grams"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="compositionDepositContainer">
                    <div class="compositionContainer">
                        <div class="nutritionTitle" x-text="singlePageData.composition"></div>
                        <div class="compositionText" x-text="singleProduct.ingredients"></div>
                    </div>
                    <div class="depositContainer">
                        <div class="nutritionTitle" x-text="singlePageData.storage"></div>
                        <div class="compositionText" x-text="singleProduct.deposit"></div>
                    </div>
                </div>
                <div class="cookingOptionContainer">
                    <div class="cookingSection">
                        <div class="nutritionTitle" x-text="singlePageData.cooking"></div>
                        <div class="compositionText" x-text="singleProduct.cooking"></div>
                </div>
            </div>
            </div>
            </template>
        </div>
    </div>
@endsection
