<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
        }

        .header {
            background-color: #533e34;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        h1 {
            margin: 0;
        }

        .details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #533e34;
            color: #fff;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Invoice - La Popas</h1>
    </div>

    <div class="details">
        <p>Order ID: {{ $order->id }}</p>
        <p>Order Date: {{ $order->created_at }}</p>

        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $productName }}</td>
                    <td>{{ $order->totalQty }}</td>
                    <td>{{ $order->totalPaid }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
