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
                    <li class="serviceContent">Dublin 1, Dublin 2, Dublin 4, Dublin 7 - Livrarea 7 euro</li>
                    <li class="serviceContent">Dublin 3, Dublin 14, Dublin 16, Dublin 20, Dublin 22, Dublin 24 - Livrarea 8 euro</li>
                    <li class="serviceContent">Dublin 6, Dublin 8, Dublin 10, Dublin 12 - Livrarea 5 euro</li>
                    <li class="serviceContent">Dublin 5 - Livrarea 10 euro</li>
                    <li class="serviceContent">Dublin 9, Dublin 11, Dublin 18 - Livrarea 12 euro</li>
                    <li class="serviceContent">Dublin 13, Dublin 17 - Livrarea 15 euro</li>
                    <li class="serviceContent">Dublin 15 - Livrarea 20 euro</li>
                </ul>

                <br>
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="deliveryData.suburbanTitle"></div>
                <div class="serviceContent" >
                    <ul class="deliveryList">
                        <li class="serviceContent">Dunboyne - 20eu</li>
                        <li class="serviceContent">Swords - 20eu</li>
                        <li class="serviceContent">Lusk Rush - 25eu</li>
                        <li class="serviceContent">Ashbourne - 25eu</li>
                        <li class="serviceContent">Skerries - 25eu</li>
                        <li class="serviceContent">Balbriggan - 25eu</li>
                        <li class="serviceContent">Rathcoole - 25eu</li>
                        <li class="serviceContent">Leixlip - 25eu</li>
                        <li class="serviceContent">Celbridge - 25eu</li>
                        <li class="serviceContent">Maynooth - 25eu</li>
                        <li class="serviceContent">Naas - 30eu</li>
                        <li class="serviceContent">Bray - 20eu</li>
                        <li class="serviceContent">Dun Laoghaire - 15eu</li>
                        <li class="serviceContent">Greystones - 25eu</li>
                        <li class="serviceContent">Kildare,Wicklow & Wexford-35eu</li>
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
