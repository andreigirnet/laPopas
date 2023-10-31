@extends('admin.main')
@section('content')
    <table class="data-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>johndoe@example.com</td>
            <td>
                <button class="edit-button">Edit</button>
                <button class="delete-button">Delete</button>
                <button class="show-button">Show</button>
            </td>
        </tr>
        <!-- Add more rows as needed -->
        </tbody>
    </table>
@endsection
