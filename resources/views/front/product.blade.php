@extends('welcome')
@section('content')
    <div class="productContainer">
        <img :src="singleProduct.images[0]" alt="" class="productSingleImg">
        <div class="productInner">
            <div class="productSingleHeader">
                <div>
                 <div class="productSingleTitle" x-text="singleProduct['name']"></div>
                    <div style="display: flex; column-gap: 3px">
                        <div x-text="singleProduct.weight"></div>
                        <div x-show="singleProduct.weight">grams</div>
                    </div>
                    <div style="display: flex; column-gap: 3px">
                        <div x-text="singleProduct.pieces"></div>
                        <div x-show="singleProduct.pieces">pieces</div>
                    </div>
                </div>
                <div class="priceActionBox">
                    <div class="priceSingleItem">
                        <div style="font-weight: 600">Price: </div>
                        <template x-if="platouCheck(singleProduct.id)">
                            <div>
                                <div class="singlePriceDigit" x-text="singleProduct.price"></div>
                            </div>
                        </template>
                        <template x-if="platouCheckShow(singleProduct.id)">
                            <div>
                                <div class="singlePriceDigit" x-text="bulkPrice"></div>
                            </div>
                        </template>
                        <div class="Currency">€</div>
                    </div>
                    <form action="{{route('basket.store')}}" x-on:submit="onSubmit" method="POST" id="singleProductForm">
                        @csrf
                        <input type="hidden" name="name" id="nameProduct">
                        <input type="hidden" name="id" :value="singleProduct.id">
                        <input type="hidden" name="page" value="single">
                        <template x-if="platouCheck(singleProduct.id)">
                        <div>
                            <input type="hidden" name="price" :value="singleProduct.price">
                        </div>
                        </template>
                        <template x-if="platouCheckShow(singleProduct.id)">
                        <div>
                            <input type="hidden" name="price" x-model="bulkPrice">
                        </div>
                        </template>
                        <input type="hidden" name="image" :value="singleProduct.images[0]">
                        <template x-if="platouCheckShow(singleProduct.id)">
                            <div class="custom-select" style="border: none">
                                <div class="select-label">
                                    <label for="sizeSelect">Mărime (grame):</label>
                                    <select id="sizeSelect" class="custom-select-dropdown" x-on:change="updatePrice($event.target.selectedIndex)">
                                        <option :value="singleProduct.size[0]" x-text="singleProduct.size[0]"></option>
                                        <option :value="singleProduct.size[1]" x-text="singleProduct.size[1]"></option>
                                    </select>
                                </div>
                            </div>
                        </template>
                        <button class="addToCartSingleButton" id="submitFormProduct">
                            <img src="{{asset('images/icons/cartSingle.png')}}" alt="">
                            <div>To Cart</div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="errorsProductMessageMeat" x-text="errorMessageProduct" x-show="errorMessageProduct"></div>
            <div class="errorsProductMessageMeat" x-text="finalSubmitError" x-show="finalSubmitError"></div>
            <template x-if="platouCheckShow(singleProduct.id)">
                <div class="personNumber">
                    <div>For</div>
                    <div x-text="platouSize"></div>
                    <div>Persons</div>
                </div>
            </template>
            <div class="deliverySingleInfo">
                <template x-if="platouCheck(singleProduct.id)">
                    <div>
                        <div class="deliverySingleText" x-text="singleProduct.message"></div>
                    </div>
                </template>
                <template x-if="platouCheckShow(singleProduct.id)">
                    <div class="multipleChoice" x-bind:id="singleProduct.id === 77 ? 'meat' : (singleProduct.id === 78 ? 'vegetables' : '')">
                        <div x-show="singleProduct.id === 77" class="productBigText" x-text="singlePageData.selectThreeItems">You can select 3 elements from below:</div>
                        <div x-show="singleProduct.id === 78" class="productBigText" x-text="singlePageData.selectFiveItems">You can select only 5 elements from below:</div>
                        <div class="listContentPlatou">
                            <template x-for="item in singleProduct.content">
                                <div class="inputCheck">
                                    <input type="checkbox" :value="item" x-on:change="updateSelectedItems(item, event, singleProduct.id === 77 ? 'meat' : 'vegetables')" x-show="singleProduct.id === 77 || singleProduct.id === 78">
                                    <div x-text="item"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

                <template x-if="platouCheckShow(singleProduct.id)">
                    <div class="multipleChoice" :id="singleProduct.id === 77 ? 'muraturi' : (singleProduct.id === 78 ? 'veggieSauce' : '')">
                        <div x-show="singleProduct.id === 77" class="productBigText" x-text="singlePageData.selectOneItem">You can Select only one item from below:</div>
                        <div x-show="singleProduct.id === 78" class="productBigText" x-text="singlePageData.selectTwoItems">You can Select only two item from below:</div>
                        <div class="listContentPlatou">
                            <template x-for="item in singleProduct.muraturi">
                                <div class="inputCheck">
                                    <input type="checkbox" :value="item" x-on:change="updateSelectedItems(item, event, singleProduct.id === 77 ? 'muraturi' : 'veggieSauce')">
                                    <div x-text="item"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

            </div>
            <div class="errorsProductMessageMeat" x-text="errorMessageProductBelow" x-show="errorMessageProductBelow"></div>
            <template x-if="platouCheckShow(singleProduct.id)">
                <div class="secondLinemultiple"  x-show="singleProduct.id === 77">
                    <div class="multipleChoice" id="salat">
                        <div class="productBigText" x-text="singlePageData.selectOneItem">You can Select only one item from below:</div>
                        <div class="listContentPlatou">
                            <template x-for="item in singleProduct.salat">
                                <div class="inputCheck">
                                    <input type="checkbox" :value="item" x-on:change="updateSelectedItems(item, event, 'salat')">
                                    <div x-text="item"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="multipleChoice"  x-show="singleProduct.id === 77" id="sauce">
                        <div class="productBigText" x-text="singlePageData.sauce">You can Select only one item from below:</div>
                        <div class="listContentPlatou">
                            <template x-for="item in singleProduct.sous">
                                <div class="inputCheck">
                                    <input type="checkbox" :value="item" x-on:change="updateSelectedItems(item, event, 'sauce')">
                                    <div x-text="item"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </template>

            <div class="singleItemLine"></div>
            <template x-if="platouCheck(singleProduct.id)">
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
                    <div class="compositionContainer" x-show="singleProduct.ingredients">
                        <div class="nutritionTitle" x-text="singlePageData.composition"></div>
                        <div class="compositionText" x-text="singleProduct.ingredients"></div>
                    </div>
                    <div class="depositContainer" x-show="singleProduct.deposit">
                        <div class="nutritionTitle" x-text="singlePageData.storage"></div>
                        <div class="compositionText" x-text="singleProduct.deposit"></div>
                    </div>
                </div>
                <div class="cookingOptionContainer">
                    <div class="cookingSection" x-show="singleProduct.cooking">
                        <div class="nutritionTitle" x-text="singlePageData.cooking"></div>
                        <div class="compositionText" x-text="singleProduct.cooking"></div>
                </div>
            </div>
            </div>
            </template>
        </div>
    </div>
@endsection
