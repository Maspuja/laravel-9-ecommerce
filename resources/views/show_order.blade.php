<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show order</title>
</head>
<body>
    <p>Order ID {{$order->id }}</p>
    <p>User : {{ $order->user_id }}</p>
    -----------------------------------------------------------------------------
    @foreach ($order->transactions as $transaction)
    <p>transaksi id : {{ $transaction->id}}</p>
    <p>Product ID: {{ $transaction->product_id}}</p>    
    <p> Name: {{ $transaction->product->name}}</p>
    <p> Price : {{ $transaction->product->price}}</p>
    <p>Qty : {{ $transaction->amount }}</p>
    <p>Total : <?php $total = $transaction->product->price * $transaction->amount ?>
                {{ $total; }}</p>
    -----------------------------------------------------------------------------   
    @endforeach
</body>
</html>