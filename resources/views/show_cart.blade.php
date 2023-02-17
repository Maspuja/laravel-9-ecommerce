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
        <div class="col-md-9">
            <table class="table table-responsive table-striped shadow">

            <tr>                
                <th><strong>No</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Item</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>QTY</strong></th>
                <th><strong>Total</strong></th>
                <th><strong>Action</strong></th>                
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
                <td>{{ number_format($cart->product->price) }}</td>
                <td><form action="{{route('update_cart', $cart) }}" method="post">
                        @method('patch')
                        @csrf
    
                        <input type="number"  name="amount" value="{{ number_format($cart->amount) }}" style="width:60px;"">
                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i></button>

                    </form> 
                </td>
                    <?php $total = $cart->product->price * $cart->amount ?>
                <td>{{ number_format($total) }}</td>
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
    </div>
        <div class="col-md-3">
            <section class="sticky-top" style="top: 20px">
            <div class="col-md-12 mb-3 card card-header mr-3 pr-3 ">
                <div class="card-header text-center"><strong>TOTAL</strong></div>
                <div class="card-body">
                    <p class="d-flex"><strong>Qty :  &nbsp; {{ number_format($total_qty) }} </strong></p>
                    <p class="d-flex"><strong>Price : {{ number_format($total_price) }}</strong></p>
                </div>              
                <div class=" card-footer ">
                        <form action="{{ route('checkout') }}" method="post">        
                            @csrf
                            <button type="submit" class="btn btn-block btn-primary"> <i class="fas fa-shopping-cart"></i> Checkout</button>
                        </form>
                </div>
            </div>
            </section>
        </div>
</div>
   
    
</div>
    
    
        
    
@endsection