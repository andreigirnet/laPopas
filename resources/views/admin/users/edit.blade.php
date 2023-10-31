@extends('admin.main')
@section('content')
    <div class="edit-user-form">
        <h1>Edit User</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST" class="formEdit">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" value="{{ $user->phone }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Adress:</label>
                <input type="tel" id="address" name="address" value="{{ $user->address }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="tel" id="city" name="city" value="{{ $user->city }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="county">County:</label>
                <input type="tel" id="county" name="county" value="{{ $user->county }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <input type="tel" id="country" name="country" value="{{ $user->country }}" class="form-control">
            </div>

            <button type="submit" class="update-button">Update User</button>
        </form>
@endsection
