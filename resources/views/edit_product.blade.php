<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}}</title>
</head>
<body>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <h1 style="background-color: red; color:white;">{{ $error }}</h1>    
    @endforeach        
@endif
    <h1>Edit product {{ $product->name}}</h1>
    <form action="{{ route('update_product', $product)}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
    <label>Product name : </label>
    <br>
    <input type="text" name="name" value="{{ $product->name }}">
    <br>
    <label for="">description :</label>
    <br>
    <input type="text" name="description" value="{{ $product->description }}">
    <br>
    <label for="">Stock: </label>
    <br>
    <input type="number" name="stock" value="{{ $product->stock }}">
    <br>
    <label for="">Price : </label>
    <br><input type="number" name="price" value="{{ $product->price }}">
    <br>
    <img src="{{ url('storage/'.$product->image) }}" alt="" height="220px" width="260px">
    <br>
    <input type="file" name="image">
    <br>
    <button type="submit">Update Product</button>
    </form>
</body>
</html>