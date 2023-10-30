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
                        <div class="singlePriceDigit" x-text="singleProduct.price"></div>
                        <div class="Currency">€</div>
                    </div>
                    <form action="{{route('basket.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="name" :value="singleProduct['name']">
                        <input type="hidden" name="id" :value="singleProduct.id">
                        <input type="hidden" name="price" :value="singleProduct.price">
                        <input type="hidden" name="image" :value="singleProduct.images[0]">
                        <button class="addToCartSingleButton">
                            <img src="{{asset('images/icons/cartSingle.png')}}" alt="">
                            <div>To Cart</div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="deliverySingleInfo">
                <div class="deliverySingleText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam assumenda consequatur dolore dolorem ducimus eius expedita explicabo, inventore, ipsum molestiae nostrum numquam optio perferendis placeat saepe similique sit soluta tempora.</div>
            </div>
            <div class="singleItemLine"></div>
            <div class="nutritionalContainer">
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
    </div>
@endsection
