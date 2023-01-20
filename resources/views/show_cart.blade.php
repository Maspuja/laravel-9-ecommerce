<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show cart</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <h1 style="background-color: red; color:white;">{{ $error }}</h1>    
        @endforeach        
    @endif
    <table>
        <tr>
            <th>no</th>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>qty</th>
            <th>total</th>

        </tr>

        <?php $i=1; ?>
        @foreach ($carts as $cart)
        <tr>
            <td>{{ $i++; }}</td>
            <td><img src="{{ url('storage/' . $cart->product->image) }}" alt="" height="100px"></td>
            <td>{{ $cart->product->name }}</td>
            <td>{{ $cart->product->price }}</td>
            <td><form action="{{route('update_cart', $cart) }}" method="post">
                    @method('patch')
                    @csrf

                    <input type="number" name="amount" value="{{ $cart->amount }}">
                    <button type="submit">update</button>
                </form> 
            </td>
                <?php $total = $cart->product->price * $cart->amount ?>
            <td>{{ $total }}</td>
            <td> <form action="{{route('delete_cart', $cart)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

        
    </table>
    <form action="{{ route('checkout') }}" method="post">
        
        @csrf
        <button type="submit">Checkout</button>
    </form>
        
    
</body>
</html>