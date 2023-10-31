@extends('dashboard')
@section('inner')
    <h2>Profile:</h2>
    <form action="{{route('dash.profile.update', $user->id)}}" class="profileForm" method="POST">
        @csrf
        @method('PUT')
        <div class="doubleRow">
            <div class="profileFormItem">
                <label for="name" class="profileFormLabel">Full Name:</label>
                <input type="text" name="name" value="{{$user->name}}">
            </div>
            <div class="profileFormItem">
                <label for="email" class="profileFormLabel">Email:</label>
                <input type="text" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="doubleRow">
            <div class="profileFormItemSingle">
                <label for="phone" class="profileFormLabel">Phone:</label>
                <input type="text" name="phone" value="{{$user->phone}}" id="phone">
            </div>
        </div>
        <div class="doubleRow">
            <div class="profileFormItem">
                <label for="address" class="profileFormLabel">Address:</label>
                <input type="text" name="address" value="{{$user->address}}">
            </div>
            <div class="profileFormItem">
                <label for="city" class="profileFormLabel">City:</label>
                <input type="text" name="city" value="{{$user->city}}">
            </div>
        </div>
        <div class="doubleRow">
            <div class="profileFormItem">
                <label for="county" class="profileFormLabel">County:</label>
                <input type="text" name="county" value="{{$user->county}}">
            </div>
            <div class="profileFormItem">
                <label for="country" class="profileFormLabel">Country:</label>
                <input type="text" name="country" value="{{$user->country}}">
            </div>
        </div>
        <button class="buttonProfileSave" type="submit">Save</button>
    </form>
@endsection
