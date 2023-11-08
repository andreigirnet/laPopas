<!DOCTYPE html>
<html>
<head>
    <title>Your Invoice</title>
</head>
<body>
<div style="font-family: Arial, sans-serif;">
    <h1 style="color: #3490dc;">Order Received</h1>
    <p>Your order has been successfully received. You can find the invoice for your order attached to this email</p>
    <p><strong>Items:</strong> {{ $products }}</p>
    <p><strong>Order ID:</strong> {{ $orderObj->id }}</p>
    <p><strong>Total:</strong> {{ $orderObj->totalPaid }}</p>
</div>
</body>
</html>
