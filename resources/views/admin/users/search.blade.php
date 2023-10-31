@extends('admin.main')
@section('content')
    {{--<button class="action-button create-button">Create</button>--}}
    <form action="{{ route('user.search') }}" method="GET">
        <div class="search-container">
            <input type="text" class="search-input" name="query" placeholder="Search by name, email or phone">
            <button type="submit" class="search-button">Search</button>
            <a href="{{route('users.index')}}" class="link-button">Back to all users</a>
        </div>
    </form>
    <table class="data-table" id="usersTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->created_at}}</td>
                <td class="lastColumnTable">
                    <a href="{{route('user.edit', $user->id)}}"><button class="edit-button">Edit</button></a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
