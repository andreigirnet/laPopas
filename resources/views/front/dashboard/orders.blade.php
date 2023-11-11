@extends('dashboard')
@section('inner')
    <h2>Orders History:</h2>
    @if(count($orders) > 0)
    <div class="table-container">
        <table class="custom-table">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Order Status</th>
                <th class="hideOnMobile">Total Quantity</th>
                <th>Price</th>
                <th class="hideOnMobile">Delivery Method</th>
                <th class="hideOnMobile">Invoice</th>
                <th class="hideOnMobile">>Date Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{!! nl2br($order->products) !!}</td>
                    <td>{{$order->status}}</td>
                    <td class="hideOnMobile">{{$order->totalQty}}</td>
                    <td>{{$order->totalPaid}}€</td>
                    @if($order->deliveryMethod === 'Delivery')
                        <td class="iconRow hideOnMobile"><img src="{{asset('images/icons/car.png')}}" class="tableIcon" alt=""></td>
                    @else
                        <td class="iconRow hideOnMobile"><img src="{{asset('images/icons/local.png')}}" id="local" class="tableIcon" alt=""></td>
                    @endif
                    <td class="iconRow hideOnMobile"><a href="{{route('download.invoice', $order->id)}}"><img src="{{asset('images/icons/pdf.png')}}" class="tableIcon" alt=""></a></td>
                    <td class="hideOnMobile">{{$order->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $orders->links('paginator') }}
    @else
        <div style="display: flex; justify-content: center; align-items: center; width: 100%; font-size: 30px">
            <p>There are no orders to display.</p>
        </div>
    @endif
@endsection
