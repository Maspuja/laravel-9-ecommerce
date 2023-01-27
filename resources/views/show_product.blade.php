@extends('layouts.header')

@section('content')

<div class="container py-2">
  <a href="{{route('index_product')}}"  class="btn btn-secondary">< Back</a>
  @if (!Auth::check() || Auth::user()->is_admin)
  <a href="{{route('edit_product', $product)}}" class="btn btn-warning">Edit Product</a>
  @endif
   
    <div class="row mt-2">
      <div  class=" col-md-6
      bg-image hover-zoom
             shadow-4-soft
             rounded-6
             mb-4
             overflow-hidden
             d-block
             "
      data-ripple-color="light"
      >
        
        <img src="{{ url('storage/'.$product->image) }}" alt="" class="w-100">
      </div>
      <div class="col-md-4 container-fluid">
        <h1>{{ $product->name }}</h1>
        <ul
                    class="rating mb-2"
                    data-mdb-toggle="rating"
                    data-mdb-readonly="true"
                    data-mdb-value="4"
                    >
                  <li>
                    <i
                       class="far fa-star fa-sm text-primary ps-0"
                       title="Bad"
                       ></i>
                  </li>
                  <li>
                    <i
                       class="far fa-star fa-sm text-primary"
                       title="Poor"
                       ></i>
                  </li>
                  <li>
                    <i
                       class="far fa-star fa-sm text-primary"
                       title="OK"
                       ></i>
                  </li>
                  <li>
                    <i
                       class="far fa-star fa-sm text-primary"
                       title="Good"
                       ></i>
                  </li>
                  <li>
                    <i
                       class="far fa-star fa-sm text-primary"
                       title="Excellent"
                       ></i>
                  </li>
                </ul>
        <h3>Description : {{ $product->description }}</h3>
        <p>Stock : {{ $product->stock }}</p>
        <p>Price : Rp. {{ number_format($product->price) }}</p>
        @if (!Auth::check() || !Auth::user()->is_admin)
        <form action="{{ route('add_to_cart', $product) }}" method="post">
            @csrf
        <p> Qty : <input type="number" name="amount" value="1" ></p>
        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-cart-plus"></i> Add to cart</button>    
        </form>
        @else
        <form action="{{ route('delete_product', $product) }}" method="post">
          @method('delete')
          @csrf
          <button class="btn btn-danger mt-2 btn-block"> <i class="far fa-trash-alt"></i> Delete</button>
        </form>
            
        @endif
        
        
      </div>
      
    </div>
  </div>
    
    <br>
    
    <br>
    <br>
    

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <h1 style="background-color: red; color:white;">{{ $error }}</h1>    
        @endforeach        
    @endif

@endsection