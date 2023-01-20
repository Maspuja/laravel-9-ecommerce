<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index product</title>
</head>
<body>
    <h1>Product</h1>
    <button> <a href="{{ route('create_product') }}">+ ADD PRODUCT</a></button>
    <table>
        <tr>
            <th>No</th>
            <th>image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        
        <?php $i=1; ?>
         @foreach ($products as $product)
        <tr>
            <td>{{ $i++; }}</td>
            <td><img src="{{ url('storage/'.$product->image) }}" height="100px" width="100px"> </td>    
            <td><a href="{{ route('show_product', $product)}}"> {{ $product->name }} </a></td>
            <td><form action="{{ route('delete_product', $product) }}" method="post">
                @method('delete')
                @csrf
                <button>Delete</button>
                </form> 
            </td>
        </tr>
         @endforeach
            
    </table>
</body>
</html>