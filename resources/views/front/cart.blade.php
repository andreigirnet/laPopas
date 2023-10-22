@extends('welcome')
@section('content')
        @if(Cart::count() === 0)
        <div class="cartEmptyContainer">
            <div class="cartEmpty">No items in the cart</div>
            <a href="/" class="homeButton">Buy Some</a>
        </div>
        @endif
        @if(Cart::count() > 0)
        <div class="cart">
            <h1>Your Cart</h1>
            <ul class="cart-items">
                @foreach(Cart::content() as $item)
                <li class="cart-item">
                    <img src="{{$item->options->image}}" alt="Product 1">
                    <div class="product-details">
                        <h2>{{$item->name}}</h2>
                        <p>{{$item->price}}</p>
                        <div class="qty">
                            <label for="quantity" class="labelQty" x-text="cartData.quantity"></label>
                            <input type="number" id="quantity_{{$item->rowId}}" value="{{$item->qty}}" name="quantity" class="nice-number-input" x-on:change="updateQuantity('{{$item->rowId}}')" min="1">
                        </div>
                    </div>
                    <form action="{{route('basket.delete', $item->rowId)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="remove-button" x-text="cartData.remove.toUpperCase()">Remove</button>
                    </form>
                </li>
                @endforeach
                <!-- Add more items as needed -->
            </ul>
            <div class="cart-total">
                <p x-text="cartTotal"></p>
            </div>
            <form action="{{route('basket.discount')}}" method="POST">
                @csrf
                <button class="checkout-button"  x-text="cartData.checkout.toUpperCase()">Checkout</button>
            </form>
        </div>
        @endif
@endsection
