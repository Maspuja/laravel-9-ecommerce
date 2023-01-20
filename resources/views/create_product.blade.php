<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h1>Form input data produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="product name">
        <br>
        <input type="text" name="description" placeholder="product description">
        <br>
        <input type="number" name="price" placeholder="product price">
        <br>
        <input type="number" name="stock" placeholder="stock">
        <br>
        <input type="file" name="image" placeholder="image">
        <br>
        <button type="submit">Save Product</button>
    </form>
</body>
</html>