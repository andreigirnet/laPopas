@extends('admin.main')
@section('content')
    <table class="data-table">
        <thead>
        <tr>
            <th>Product Content</th>
            <th>Comments</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{!! nl2br($order->products) !!}</td>
            <td>{{$order->comments}}</td>
        </tr>
        </tbody>
    </table>
@endsection
