@extends('welcome')
@section('content')
    <div class="serviceContainer">
        <div class="serviceTitle" x-text="deliveryData.mainTitle"></div>
        <div class="serviceInner">
            <div class="serviceLeft">
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="deliveryData.finitProductsTitle"></div>
                <div class="serviceContent" x-html="deliveryData.finitText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum illo incidunt itaque laboriosam, nisi qui quibusdam reiciendis sed similique voluptatem. Aliquid delectus dolorem dolores hic impedit porro possimus quas unde.</div>
                <ul class="deliveryList">
                    <li class="serviceContent">Dublin 1, Dublin 2, Dublin 4, Dublin 7 - <span style="color: green"><span x-text="deliveryData.delivery"></span> 7 €</span></li>
                    <li class="serviceContent">Dublin 3, Dublin 14, Dublin 16, Dublin 20, Dublin 22, Dublin 24 - <span style="color: green"><span x-text="deliveryData.delivery"></span> 8 €</span></li>
                    <li class="serviceContent">Dublin 6, Dublin 8, Dublin 10, Dublin 12 - <span style="color: green"><span x-text="deliveryData.delivery"></span> 5 €</span></li>
                    <li class="serviceContent">Dublin 5 - <span style="color: green"><span x-text="deliveryData.delivery"></span> 10 €</span></li>
                    <li class="serviceContent">Dublin 9, <span style="color: green"><span x-text="deliveryData.delivery"></span> 12 €</span></li>
                    <li class="serviceContent">Dublin 13, Dublin 17 - <span style="color: green"><span x-text="deliveryData.delivery"></span> 15 €</span></li>
                    <li class="serviceContent">Dublin 15 - <span style="color: green"><span x-text="deliveryData.delivery"></span> 20 €</span></li>
                </ul>

                <br>
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="deliveryData.suburbanTitle"></div>
                <div class="serviceContent" >
                    <ul class="deliveryList">
                        <li class="serviceContent">Dunboyne - 20€</li>
                        <li class="serviceContent">Swords - 20€</li>
                        <li class="serviceContent">Lusk Rush - 25€</li>
                        <li class="serviceContent">Ashbourne - 25€</li>
                        <li class="serviceContent">Skerries - 25€</li>
                        <li class="serviceContent">Balbriggan - 25€</li>
                        <li class="serviceContent">Rathcoole - 25€</li>
                        <li class="serviceContent">Leixlip - 25€</li>
                        <li class="serviceContent">Celbridge - 25€</li>
                        <li class="serviceContent">Maynooth - 25€</li>
                        <li class="serviceContent">Naas - 30€</li>
                        <li class="serviceContent">Bray - 20€</li>
                        <li class="serviceContent">Dun Laoghaire - 15€</li>
                        <li class="serviceContent">Greystones - 25€</li>
                        <li class="serviceContent">Kildare,Wicklow & Wexford-35€</li>
                    </ul>
                </div>
            </div>
            <div class="serviceRight">
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="deliveryData.deliveryPayment"></div>
                <div class="serviceContent" x-text="deliveryData.deliveryPaymentText"></div>
                <br>
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="">Important</div>
                <template x-for="item in deliveryData.important">
                <div class="serviceContent" x-text="item"></div>
                </template>
            </div>
        </div>
    </div>
@endsection
