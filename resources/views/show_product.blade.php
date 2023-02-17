@extends('layouts.header')

@section('content')

<div class="container py-2">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('index_product')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('index_product')}}">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
      </nav>
    </div>
  </nav>  

  @if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
        <strong>{{ Session::get('message') }}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card">
    <div class="row mt-2 p-2">
      <div  class=" col-md-7 p-2
      bg-image hover-zoom
             shadow-4-soft
             rounded-6
             mb-4
             overflow-hidden
             d-block
             "
      data-ripple-color="light"
      >
      <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
        <div class="row py-3 shadow-5">
          <div class="col-12 mb-1">
            <div class="lightbox">
              <img
                src="{{ url('storage/'.$product->image) }}"
                data-mdb-img="{{ url('storage/'.$product->image) }}"
                alt="White blouse"
                class="ecommerce-gallery-main-img active w-100"
              />
            </div>
          </div>
          <div class="col-3 mt-1">
            <img
              src="{{ url('storage/'.$product->image) }}"
              data-mdb-img="{{ url('storage/'.$product->image) }}"
              data-mdb-img="{{ url('storage/'.$product->image) }}"
              alt="White blouse"
              class="active w-100"
            />
          </div>
          <div class="col-3 mt-1">
            <img
              src="{{ url('storage/'.$product->image) }}"
              data-mdb-img="{{ url('storage/'.$product->image) }}"
              alt="Blue Jeans Jacket"
              class="w-100"
            />
          </div>
          <div class="col-3 mt-1">
            <img
              src="{{ url('storage/'.$product->image) }}"
              data-mdb-img="{{ url('storage/'.$product->image) }}"
              alt="Red Sweatshirt"
              class="w-100"
            />
          </div>
          <div class="col-3 mt-1">
            <img
              src="{{ url('storage/'.$product->image) }}"
              data-mdb-img="{{ url('storage/'.$product->image) }}"
              alt="Black Shirt"
              class="w-100"
            />
          </div>
        </div>
      </div>
        
        {{-- <img src="{{ url('storage/'.$product->image) }}" alt="" class="w-100 p-2"> --}}
      </div>
      <div class="col-md-4 py-2 container-fluid card card-header mb-2">
        
        <h1 class="mt-2  "><hr>{{ $product->name }} <hr></h1>
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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-dismissible fade show" role="alert" data-mdb-color="danger">
                    <strong>{{ $error }}</strong> 
                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>   
            @endforeach        
        @endif
        @if (!Auth::check() || !Auth::user()->is_admin)
        <form action="{{ route('add_to_cart', $product) }}" method="post">
            @csrf
        <p> Qty : <input type="number" name="amount" value="1"></p>
        <button type="submit" class="btn btn-primary btn-block mb-4"><i class="fas fa-cart-plus"></i> Add to cart</button>    
        </form>
        @else
        <form action="{{ route('delete_product', $product) }}" method="post">
          @method('delete')
          @csrf
          <a href="{{route('edit_product', $product)}}" class="btn btn-warning btn-block mt-2 mb-2"><i class="fas fa-edit"></i> Edit Product</a>
          <button class="btn btn-danger mt-2 btn-block"> <i class="far fa-trash-alt"></i> Delete</button>
          
        </form>
            
        @endif
        
        
      </div>
    </div> 
    </div>
    <div id="disqus_thread" class="mt-3 card p-2"></div>
      <script>
          /**
          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = 'https://adiba-shop.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
          })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  </div>
  


   

@endsection