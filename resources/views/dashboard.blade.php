@extends('welcome')
@section('content')
    <div class="dashboardContainer">
        <div class="dashboardSection">
            <div class="side-menu">
                <ul class="menu-items">
                    <li><a href="{{route('dash.profile.index')}}">Profile</a></li>
                    <li><a href="{{route('dash.orders.index')}}">Orders</a></li>
                </ul>
            </div>
            <div class="content">
                @yield('inner')
            </div>
        </div>
    </div>
@endsection

