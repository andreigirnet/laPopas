@extends('dashboard')
@section('inner')
    <h2>Orders History:</h2>
    <div class="table-container">
        <table class="custom-table">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Total Quantity</th>
                <th>Price</th>
                <th>Delivery Method</th>
                <th>Date Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{!! nl2br($order->products) !!}</td>
                    <td>{{$order->totalQty}}</td>
                    <td>{{$order->totalPaid}}€</td>
                    @if($order->deliveryMethod === 'Delivery')
                        <td class="iconRow"><img src="{{asset('images/icons/car.png')}}" class="tableIcon" alt=""></td>
                    @else
                        <td class="iconRow"><img src="{{asset('images/icons/local.png')}}" id="local" class="tableIcon" alt=""></td>
                    @endif
                    <td>{{$order->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
