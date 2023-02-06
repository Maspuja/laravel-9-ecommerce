@extends('layouts.header')

@section('content')
    <div class="card card-detail text-center text-uppercase">
        <h1>order detail</h1>
    </div>

    @php
        $total_price = 0;    
        $total_qty = 0;  
    @endphp

    <div class="card">
        <div class="card-body">
            <strong><p>Order ID : {{$order->id }}</p>
            <p>User : {{ $order->user_id }}</p>
            <p>name : </p></strong>
        </div>
        
    </div>
    <table class="table table-responsive table-striped">
        <tr class="bg-light">
            <th><strong>No Tr</strong> </th>
            <th><strong>Id </strong> </th>
            <th><strong>Nama</strong>  </th>
            <th><strong>Harga </strong> </th>
            <th><strong>Qty</strong> </th>
            <th><strong>Total</strong> </th>
        </tr>

    
    @foreach ($order->transactions as $transaction)
    <tr>
        <td>{{ $transaction->id}}</td>
        <td>{{ $transaction->product_id}}</td>
        <td>{{ $transaction->product->name}}</td>
        <td>{{ $transaction->product->price}}</td>
        <td>{{ $transaction->amount }}</td>
        <td><?php $total = $transaction->product->price * $transaction->amount ?>
            {{ $total; }}</th>

    </tr> 

    @php
        $total_price += $transaction->product->price * $transaction->amount;
    @endphp
    @php
        $total_qty += $transaction->amount;
    @endphp
   
    @endforeach
</table>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">@if ($order->is_paid == false && $order->payment_receipt == null)
    
                    <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="payment_receipt">Upload Your payment receipt</label>
                        <br>
                        <input type="file" name="payment_receipt" id="payment_receipt">
                        <br>
                        <button type="submit" class="btn btn-primary mt-1">Submit Payment</button>
                    </form>
                    @else

                    @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('message') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <p><i class="fas fa-check-circle" ></i> anda sudah upload payment receipt</p>
                        <img src="{{ url('storage/'.$order->payment_receipt) }}" alt="foto bukti" height="100px">
                        <br>
                        @endif</div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-end ">
                        <p class="">Total Qty : {{ number_format($total_qty) }}</p> 
                    </div>
                    <div class="d-flex justify-content-end">
                        <p class="" ><strong>Total Price : {{ number_format($total_price) }}</strong></p>
                    </div>
                </div>
              </div>
       
        
            
        </div>
        
    </div>

       
   
@endsection