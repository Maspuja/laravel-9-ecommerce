@extends('layouts.header')

@section('content')

<div class="card card-header text-center text-uppercase mb-2">
    <h1>Show Cart</h1>
</div>
@if (Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('message') }}</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $error }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
        @endforeach        
    @endif
    <div class="row">
        <col-md-6></col-md-6>
        <col-md-6></col-md-6>
    </div>
    <table class="table table-responsive table-hover table-striped">
        <tr class="bg-light">
            <th>no</th>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>qty</th>
            <th>total</th>
            <th>Action</th>

        </tr>
        @php
        $total_price = 0;    
        $total_qty= 0;
        @endphp

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
                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i></button>
                </form> 
            </td>
                <?php $total = $cart->product->price * $cart->amount ?>
            <td>{{ $total }}</td>
            <td> <form action="{{route('delete_cart', $cart)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @php
            $total_price += $cart->product->price * $cart->amount;
            $total_qty += $cart->amount;
        @endphp
        @endforeach
           
    </table>
    <div class="card">
    <div class="col-md-12 mb-3 card-body mr-3 pr-3 ">
        <p class="d-flex justify-content-end ">Total Qty : {{ number_format($total_qty) }}</p>
        <p class="d-flex justify-content-end "><strong>Total Price : {{ number_format($total_price) }}</strong></p><br>
        <div class="d-flex justify-content-end ">
            <form action="{{ route('checkout') }}" method="post">        
            @csrf
            <button type="submit" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Checkout</button>
        </form>  </div>
    </div>
</div>
    
    
        
    
@endsection