<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('Mdbootstrap/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('Mdbootstrap/plugins/css/ecommerce-gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('Mdbootstrap/plugins/css/multi-carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Mdbootstrap/plugins/css/captcha.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('Mdbootstrap/src/plugins/ecommerce-gallery/scss/_ecommerce-gallery.scss')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Font Awesome -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Laravel-9 ADAB STUDIO</title>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark text-light bg-primary">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
      <a class="navbar-brand me-2 text-light" href="{{ route('index_product')}}">
         Adab Studio
      </a>
  
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarButtonsExample"
        aria-controls="navbarButtonsExample"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index_blog')}}">Blog</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index_product')}}">Product</a>
          </li>      
          <li class="nav-item">
            <a class="nav-link" href="{{ route('show_cart')}}">cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index_order', ) }}">Order</a>
          </li>

          @if (!Auth::check() || Auth::user()->is_admin == true)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index_category')}}">Category</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('create_blog')}}">Add Blog</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('create_product')}}">Add product</a>
          </li>  
        @endif 
          
        </ul>
        <!-- Left links -->
  
        <div class="d-flex align-items-center">
            @guest
                @if (Route::has('login'))
                    <button type="button" class="btn btn-secondary px-3 me-2">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </button>
                @endif

                @if (Route::has('register'))
                    <button type="button" class="btn btn-primary me-3">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </button>
                @endif
            @else
                <div class="dropdown">
                    <button
                        class="btn btn-dark dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                        >
                        <i class="fab fa-github"></i
                            > {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('show_profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('show_password') }}">Change Password</a></li>
                        
                      </ul>
                    </div>
                    <div>
                      <button class="btn btn-secondary ml-2"> 
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                        </a> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>
                    </div>
                    
           
            @endguest
        </div>
      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

  <main class="py-4">
    <div class="container pb-5 mb-5">
    @yield('content')
    </div>
  </main>

</body>
<footer class="text-center text-white" style="background-color: #f1f1f1;">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-linkedin"></i
        ></a>
        <!-- Github -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright: mas-mas-it.com
    </div>
    <!-- Copyright -->
  </footer>
<script type="text/javascript" src="{{ asset('Mdbootstrap/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('Mdbootstrap/plugins/js/ecommerce-gallery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('Mdbootstrap/plugins/js/multi-carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('Mdbootstrap/plugins/js/captcha.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('Mdbootstrap/src/plugins/ecommerce-gallery/js/ecommerce-gallery.js')}}"></script>

</html>