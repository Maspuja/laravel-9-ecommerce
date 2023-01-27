@extends('layouts.header')

@section('content')
<div class="container col-md-6">
    <div class="card text-center text-uppercase">
      <h1>Table order </h1>
      </div>

    @foreach ($orders as $order)
    <div class="card">
      <div class="card-header">
    <p><strong>Order No : {{ $order->id }}</strong></p>
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
          <button type="submit" class="btn btn-success">Confirm Payment</button>
        </form>
        @endif
      
        @endif
        
       
          
      @endif</p>
      <br>
      
    </div>
  </div>
      
    @endforeach
    {{-- <div class="pagination">
      {{ $orders->links('pagination::bootstrap-5') }}
    </div> --}}
</div>
@endsection