<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}}</title>
</head>
<body>
    
    <h1>{{ $product->name }}</h1>
    <img src="{{ url('storage/'.$product->image) }}" alt="" height="220px" width="260px">
    <h3>{{ $product->description }}</h3>
    <p>Stock : {{ $product->stock }}</p>
    <p>Price : {{ $product->price }}</p>
    <br>
    <button><a href="{{route('edit_product', $product)}}">Edit Product</a></button>
    <button><a href="{{route('index_product')}}">Back</a></button>
    <br>
    <br>
    <form action="{{ route('add_to_cart', $product) }}" method="post">
        @csrf
        <input type="number" name="amount" value="1">
        <button type="submit">Add to cart</button>

    </form>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <h1 style="background-color: red; color:white;">{{ $error }}</h1>    
        @endforeach        
    @endif
</body>
</html>