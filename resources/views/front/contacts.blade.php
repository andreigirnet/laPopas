@extends('welcome')
@section('content')
    <div class="serviceContainer">
        <div class="serviceTitle">Contacts</div>
        <div class="contactsInner">
            <div class="contactsLeft">
                <div class="deliveryContacts">
                    <div class="deliveryContactsContent">Livrare</div>
                    <img src="{{asset('images/icons/truck.png')}}" class="truck" alt="">
                </div>
                <div class="deliveryLocationTime">
                    <div class="deliveryLocation">Dublin</div>
                    <div class="deliveryTime">08:30-20:00</div>
                </div>
                <img src="{{asset('images/icons/image-delivery.png')}}" class="imageDeliveryContacts" alt="">
            </div>
            <div class="contactsRight">
                <div class="contactsRightUpper">
                    <div class="contactsRightTitle">Main Office</div>
                    <div class="contactsRightUpperFirstRow">
                        <div class="contactsContent">Luni-Vineri</div>
                        <div class="contactsContent">09:00-17:30</div>
                        <div class="contactsContent">Tel: 079776347</div>
                    </div>
                    <div class="contactsRightLowerSecondRow">
                        <div class="contactsContent">Fax: 079776347</div>
                        <div class="contactsContent">office@lapopas.irl</div>
                    </div>
                </div>
                <div class="contactsLower">
                    <div class="contactsLowerLeft">
                        <div class="contactsRightTitle">Contabilitate</div>
                        <div class="contactsContent lowerContent leftPadd">Luni-Vineri</div>
                        <div class="contactsContent leftPadd">09:00-17:30</div>
                    </div>
                    <div class="contactsLowerRight">
                        <div class="contactsRightTitle">Sales</div>
                        <div class="contactsContent lowerContent " >Luni-Vineri</div>
                        <div class="contactsContent">09:00-17:30</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
