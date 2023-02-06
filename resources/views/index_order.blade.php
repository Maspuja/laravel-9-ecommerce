@extends('layouts.header')

@section('content')
<div class="container">
    <div class="card text-center text-uppercase">
      <h1>Data order </h1>
      </div>
      @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    <div class="card p-3">
      <div class="row">
    @foreach ($orders as $order)
    <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <form action="{{ route('show_order', $order) }}" method="get">
          <button type="submit" class="btn btn-block btn-info">Order No : {{ $order->id }}</button>
        </form>    
      </div>
      <div class="card-body">
      <p>User ID : {{ $order->user_id }}</p>
      <p>Order Date: {{ $order->created_at }}</p>
      <p>@if ($order->is_paid == True)
        Status : <b class="text-success">Paid</b>  
                
        @else
        Status : <b class="text-warning">Unpaid</b> 
        <br>
        @if ($order->payment_receipt == NULL)
            
        @else
        <a href="{{ url('storage/'. $order->payment_receipt)}}" target="__blank">Lihat bukti TF</a>
        <br>

        @if (!Auth::check() || Auth::user()->is_admin)
        

        <form action="{{ route('confirm_payment', $order) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-block btn-success">Confirm Payment</button>
        </form>
        @endif
      
        @endif
        
       
          
      @endif</p>
      <br>
      
    </div>
  </div>
</div>
      
    @endforeach
    {{-- <div class="pagination">
      {{ $orders->links('pagination::bootstrap-5') }}
    </div> --}}
  </div>
</div>
@endsection