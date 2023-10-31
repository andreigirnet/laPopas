@extends('admin.main')
@section('content')
    <form action="{{ route('orders.search') }}" method="GET">
        <div class="search-container">
            <input type="text" class="search-input" name="query" placeholder="Search by orderId or phone number">
            <button type="submit" class="search-button">Search</button>
            <a href="{{route('orders.index')}}" class="link-button">Back to all Orders</a>
        </div>
    </form>
    <table class="data-table" id="ordersTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            {{--            <th>User Email</th>--}}
            <th>User Phone</th>
            <th>Status</th>
            <th>Products</th>
            <th>Total Paid</th>
            <th>Total Quantity</th>
            <th>Delivery Method</th>
            <th>Invoice</th>
            <th>Created At</th>
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
                <td>{{$order->products}}</td>
                <td>{{$order->totalPaid}}€</td>
                <td>{{$order->totalQty}}</td>
                <td>{{$order->deliveryMethod}}</td>
                <td>{{$order->invoice}}</td>
                <td>{{$order->created_at}}</td>
                <td class="lastColumnTable">
                    <a href="{{route('orders.edit', $order->id)}}"><button class="edit-button">Edit</button></a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                    <button class="delete-button">History</button>
                </td>
            </tr>
        @endforeach
        <!-- Add more rows as needed -->
        </tbody>
    </table>
@endsection
