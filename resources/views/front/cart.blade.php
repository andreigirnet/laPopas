@extends('welcome')
@section('content')




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
                        <label for="quantity" class="labelQty">Quantity:</label>
                        <input type="number" id="quantity_{{$item->rowId}}" name="quantity" x-model="quantity" class="nice-number-input" x-on:mouseleave="updateQuantity(rowId, quantity)" min="1"  default="1">
                    </div>
                </div>
                <form action="{{route('basket.delete', $item->rowId)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="remove-button">Remove</button>
                </form>
            </li>
            @endforeach
            <!-- Add more items as needed -->
        </ul>
        <div class="cart-total">
            <p>{{Cart::total()}}</p>
        </div>
        <button class="checkout-button">Checkout</button>
    </div>
@endsection
