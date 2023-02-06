@extends('layouts.header')

@section('content')

<div class="mb-2 container col-md-6">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-dismissible fade show" role="alert" data-mdb-color="danger">
            <strong>{{ $error }}</strong> 
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
        </div>   
    @endforeach        
@endif
    <div class="mb-2 card">
        <div class="mb-2 card-header text-center">
            <h1>Edit product</h1>
            <p> {{ $product->name}}</p>
        </div>
        <div class="mb-2 card-body">
            <form action="{{ route('update_product', $product)}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
            <label>Product name : </label>
            
            <input class="mb-2 form-control" type="text" name="name" value="{{ $product->name }}">
            
            <label for="">description :</label>
            
            <input class="mb-2 form-control" type="text" name="description" value="{{ $product->description }}">
            
            <label for="">Stock: </label>
            
            <input class="mb-2 form-control" type="number" name="stock" value="{{ $product->stock }}">
            
            <label for="">Price : </label>
            <input class="mb-2 form-control" type="number" name="price" value="{{ $product->price }}">
            
            <img src="{{ url('storage/'.$product->image) }}" alt="" class="mb-2 img-fluid">
            
            <input class="mb-2 form-control" type="file" name="image">
            
            <button type="submit" class="mb-2 btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
    
    

</div>
@endsection