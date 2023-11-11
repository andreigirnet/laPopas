@extends('admin.main')
@section('content')
    <div class="edit-user-form">
        <h1>Edit Order</h1>
        <form action="{{ route('orders.update', $order->id) }}" method="POST" class="formEdit">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="email">Change Status:</label>
                <select class="custom-select" id="order-status" name="orderStatus">
                    <option value="paid">Paid</option>
                    <option value="in-progress">In Progress</option>
                    <option value="delivery">Delivery</option>
                    <option value="done">Done</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Delivery Method:</label>
                <select class="custom-select" id="delivery-status" name="deliveryStatus">
                    <option value="Local">Local</option>
                    <option value="Delivery">Delivery</option>
                </select>
            </div>

            <button type="submit" class="update-button">Update User</button>
        </form>
@endsection
