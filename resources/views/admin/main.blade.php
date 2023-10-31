<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body>
<div class="admin-panel">
    <div class="sidebar">

        <div class="logo"><img src="{{asset('images/logo/Logo.png')}}" class="logoAdmin" alt=""></div>
        <ul class="menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{route('users.index')}}">Users</a></li>
            <li><a href="{{route('orders.index')}}">Orders</a></li>
        </ul>
    </div>
    <div class="content">
        <header>
            <h1>Admin Panel - Dashboard</h1>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
