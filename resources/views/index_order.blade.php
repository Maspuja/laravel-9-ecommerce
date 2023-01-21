<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
    <h1>Table order </h1>
    @foreach ($orders as $order)
    -----------------------------------------
    <p>Order No : {{ $order->id }}</p>
    -----------------------------------------
      <p>User ID : {{ $order->user_id }}</p>
      <p>Order Date: {{ $order->created_at }}</p>
    
      
    @endforeach
    
</body>
</html>