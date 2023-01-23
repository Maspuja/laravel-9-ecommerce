@extends('layouts.header')

@section('content')

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <h1 style="background-color: red; color:white;">{{ $error }}</h1>    
    @endforeach        
@endif
<div class="container col-md-5">
    <div class="card">
        <div class="card-header">
            <h1>Form input data produk</h1>
        </div>
        <div class="card-body col-md-10">
        <form action="{{ route('create_product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-outline mb-3">
                <input type="text" name="name" class="form-control" />
                <label class="form-label" for="form1Example1">Product name</label>
            </div>

            <div class="form-outline mb-3">
                <input type="text" name="description"  class="form-control" />
                <label class="form-label" for="form1Example1">Description</label>
            </div>
            <div class="form-outline mb-3">
                <input type="text" name="price" class="form-control" />
                <label class="form-label" for="form1Example1">Price</label>
            </div>
            <div class="form-outline mb-3">
                <input type="text" name="stock" class="form-control" />
                <label class="form-label" for="form1Example1">stock</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="customFile">image</label>
                <input type="file" class="form-control" name="image" id="customFile" />
            </div>
            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
        </div>
    </div>
</div>
    
    
@endsection