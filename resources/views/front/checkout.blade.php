@extends('welcome')
@section('content')
    <div class="checkoutContainer">
        <div class="basketContainer">
            <ul class="cart-items" id="checkoutBasketCart">
                @foreach(Cart::content() as $item)
                    <li class="cart-item">
                        <img src="{{$item->options->image}}" alt="Product 1">
                        <div class="product-details">
                            <h2>{{$item->name}}</h2>
                            <div class="cartCheckoutPrice">
                                <p x-text="checkoutData.price"></p>
                                <p>{{$item->price}}</p>
                                <div>€</div>
                            </div>
                            <div class="qty">
                                <label for="quantity" class="labelQty" x-text="checkoutData.quantity"></label>
                                <input type="hidden" id="total" value="{{Cart::Total()}}">
                                <input type="number" id="quantity_{{$item->rowId}}" value="{{$item->qty}}" name="quantity" class="nice-number-input" x-on:change="updateQuantity('{{$item->rowId}}')" min="1">
                            </div>
                        </div>
                        <form action="{{route('basket.delete', $item->rowId)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="remove-button" x-text="checkoutData.remove.toUpperCase()">Remove</button>
                        </form>
                    </li>
                @endforeach
                <!-- Add more items as needed -->
            </ul>
            <div class="checkoutTotal">
                <div class="cart-total">
                    <div class="total">Total</div>
                    <div class="amountWrap">
                        <p x-text="cartTotal" class="amount"></p>
                        <p>euro</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-container">
            <h1>Checkout</h1>
            <form id="checkout-form" method="POST">
                @csrf
                <div id="link-authentication-element">
                    <!--Stripe.js injects the Link Authentication Element-->
                </div>
                <input type="hidden" name="cartTotal" id="cartTotal" value="{{Cart::total()}}">
                <input type="hidden" name="cartQty" id="qty" value="{{Cart::count()}}">
                <div class="form-group">
                    <label for="name" x-text="checkoutData.name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{auth()->user()->name}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{auth()->user()->email}}" required>
                </div>
                <div class="form-group">
                    <label for="address" x-text="checkoutData.address">Shipping Address</label>
                    <input type="text"  id="address" name="address" value="{{auth()->user()->address}}"  required>
                </div>
                <div class="form-group">
                    <label for="address" x-text="checkoutData.county">County</label>
                    <input type="text" id="county" name="county" value="{{auth()->user()->county}}" required>
                </div>
                <div class="form-group">
                    <label for="address" x-text="checkoutData.city">City</label>
                    <input type="text" id="city" name="city" value="{{auth()->user()->city}}" required>
                </div>
                <div class="form-group">
                    <label for="address" x-text="checkoutData.country">Country</label>
                    <input type="text" id="country" name="country" value="{{auth()->user()->country}}" required>
                </div>
                <div class="form-group">
                    <label for="address" x-text="checkoutData.phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{auth()->user()->phone}}" required>
                </div>
                <div class="form-group">
                    <label for="address" x-text="checkoutData.comments">Comments</label>
                    <textarea type="text" id="comments" name="comments" rows="4"></textarea>
                </div>
                <div id="card-element"></div>
                <div id="card-errors" style="color: red" role="alert"></div>
                <button type="submit" id="submit" class="btn-submit">Pay now</button>
                <div id="payment-message" class="hidden"></div>
            </form>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/stripe.js')}}"></script>
@endsection
