@extends('admin.main')
@section('content')
    <form action="{{ route('orders.search') }}" method="GET">
        <div class="search-container">
            <input type="text" class="search-input" name="query" placeholder="Search by orderId or phone number">
            <button type="submit" class="search-button">Search</button>
        </div>
    </form>
    <table class="data-table" id="ordersTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>User Phone</th>
            <th>Status</th>
            <th>Products</th>
            <th>Total Paid</th>
            <th>Total Quantity</th>
            <th>Delivery Method</th>
            <th>Invoice</th>
            <th>Created At</th>
            <th>Comments</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
{{--                <td>{{$order->user->email}}</td>--}}
                <td>{{$order->user->phone}}</td>
                <td>{{$order->status}}</td>
                <td>{!! strlen($order->products) > 60 ? substr($order->products, 0, 50) . '...' : $order->products !!}</td>
                <td>{{$order->totalPaid}}€</td>
                <td>{{$order->totalQty}}</td>
                @if($order->deliveryMethod === 'Delivery')
                    <td class="iconRow"><img src="{{asset('images/icons/car.png')}}" class="tableIcon" alt=""></td>
                @else
                    <td class="iconRow"><img src="{{asset('images/icons/local.png')}}" id="local" class="tableIcon" alt=""></td>
                @endif

                <td class="iconRow"><a href="{{route('download.invoice', $order->id)}}"><img src="{{asset('images/icons/pdf.png')}}" class="tableIcon" alt=""></a></td>

                <td>{{$order->created_at}}</td>
                <td>{{ strlen($order->comments) > 60 ? substr($order->comments, 0, 50) . '...' : $order->comments }}</td>
                <td class="lastColumnTable">
                    <a href="{{route('orders.edit', $order->id)}}"><button class="edit-button">Edit</button></a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                    <a href="{{route('orders.show', $order->id)}}"><button class="edit-button">Content</button></a>
                </td>
            </tr>
        @endforeach
        <!-- Add more rows as needed -->
        </tbody>
    </table>
    {{ $orders->links('paginator') }}
@endsection
