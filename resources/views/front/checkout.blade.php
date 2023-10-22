@extends('welcome')
@section('content')
    <div x-text="cartTotal"></div>
    <div class="checkout-container">
        <h1>Checkout</h1>
        <form id="checkout-form" method="POST">
            @csrf
            <input type="hidden" name="cartTotal" id="cartTotal" value="{{Cart::total()}}">
            <input type="hidden" name="cartQty" id="qty" value="{{Cart::count()}}">
            <div id="link-authentication-element">
                <!--Stripe.js injects the Link Authentication Element-->
            </div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Shipping Address</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
            <div id="card-element"></div>
            <div id="card-errors" style="color: red" role="alert"></div>
            <button type="submit" id="submit" class="btn-submit">Pay now</button>
            <div id="payment-message" class="hidden"></div>
        </form>
    </div>
@endsection
