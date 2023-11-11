@extends('welcome')
@section('content')
    <div class="serviceContainer">
        <div class="serviceTitle" x-text="contactData.contacts">Contacts</div>
        <div class="contactsInner">
            <div class="contactsLeft">
                <div class="deliveryContacts">
                    <div class="deliveryContactsContent" x-text="contactData.delivery">Livrare</div>
                    <img src="{{asset('images/icons/truck.png')}}" class="truck" alt="">
                </div>
                <div>
                    <div class="contactsRightTitle"  x-text="contactData.timeDelivery">Orele pentru livrare</div>
                    <div class="contactsContent">12:00-20:00 / 7 zile</div>
                </div>
                <div>
                    <div class="contactsRightTitle" x-text="contactData.howOrderTitle">Cum Comandați</div>
                    <div class="contactsContent" x-text="contactData.howOrderContent">Adaugati produsele dorite în coș și efectuati înregistrarea cu datele personale corecte (va rog verificati datele personale Numele deplin/Adresa de email/Adresa de livrare) înainte de a plasa comanda pentru a nu comite greșeli. După plasarea comenzii veți primi prin email informația cu privire la comanda dvs.</div>
                </div>

                <div class="deliveryLocationTime">
                    <div class="deliveryLocation">Dublin</div>
                    <div class="deliveryTime">08:30-20:00</div>
                </div>
                <img src="{{asset('images/icons/image-delivery.png')}}" class="imageDeliveryContacts" alt="">
            </div>
            <div class="contactsRight">
                <div class="contactsRightUpper">
                    <div class="contactsRightTitle"  x-text="contactData.office">Main Office</div>
                    <div class="contactsRightUpperFirstRow">
                        <div class="contactsContent" x-text="contactData.weekDays">Luni-Duminica</div>
                        <div class="contactsContent">9:00am-9:00pm </div>
                        <div class="contactsContent">Tel: 0892333268</div>
                        <div class="contactsContent">Unit 1,Saint Agnes Road,Crumlin Village Dublin 12</div>
                    </div>
                    <div class="contactsRightLowerSecondRow">
                        <div class="contactsContent">Live chat (8:30am-10:00pm)</div>
                        <div class="contactsContent">info@lapopas.com</div>
                    </div>
                </div>
                <div>
                    <div class="contactsRightTitle" x-text="contactData.paymentTitle">Modalitați plată</div>
                    <div class="contactsContent" x-text="contactData.paymentContent">În numerar la plasarea comenzii. Card bancar:Visa,Master Card,Maestro (se accepta orice card bancar emis de orice tara inclusiv Revolut card).</div>
                </div>
                <div>
                    <div class="contactsRightTitle" x-text="contactData.speedDeliveryTitle">Timp Livrare:</div>
                    <div class="contactsContent" x-text="contactData.speedDeliveryContent">Comanda înregistrată pana la ora 20:00 va fi livrată a doua zi la ora dorită de         dvs. Intre orele 12:00-20:00.</div>
                </div>
            </div>
        </div>
    </div>
@endsection
