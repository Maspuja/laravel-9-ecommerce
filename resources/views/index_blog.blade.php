@extends('layouts.header')

@section('content')

<!-- Container for demo purpose -->
<div class="container my-1">

  <!--Section: Design Block-->
  <section class="mb-10">

    <div class="row gx-lg-5">

      @foreach ($blogs as $blog)
      <div class="col-lg-8 card card-header">
        <div class="mb-5">
          <div class="bg-image hover-overlay hover-zoom ripple rounded-6 mb-4" data-mdb-
          ripple-color="light">
            <img class="w-100" src="{{ url('storage/'.$blog->image) }}"
              style="max-height: 475px; object-fit: cover;" alt="Image placeholder">
            <a href="{{route('show_blog', $blog->slug)}}">
              <div class="mask">
                <div
                     class="
                            d-flex
                            justify-content-end
                            align-items-end
                            h-10
                            p-1
                            "
                     >
                  <span class="badge badge-dark rounded-pill me-2"
                        >{{ $blog->created_at }}</span
                    >
                </div>
              </div>
            </a>
          </div>
          <h6 class="text-muted text-uppercase small pb-1"><a href="#!" class="text-reset">{{ $blog->category_id }}</a></h6>
          <h4 class="fw-bold mb-3"><a href="{{route('show_blog', $blog->slug)}}" class="text-reset">{{ $blog->name }}</a></h4>
          <p class="text-truncate"
            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; white-space: normal">
           {!! Str::limit($blog->description, 100) !!}
          </p>
        </div>
      </div>

      @endforeach

      
      <div class="col-lg-4 p-1">
        @foreach ($blogss as $blog)
        <div class="card card-header mb-1 shadow">
          <div class="bg-image hover-overlay hover-zoom ripple rounded-5 mb-4" data-mdb-ripple-color="light">
            <img class="w-100" src="{{ url('storage/'.$blog->image) }}"
              style="height: 227px; object-fit: cover;" alt="Image placeholder">
            <a href="{{route('show_blog', $blog->slug)}}">
              <div class="mask">
                <div
                     class="
                            d-flex
                            justify-content-end
                            align-items-end
                            h-10
                            p-1
                            "
                     >
                  <span class="badge badge-dark rounded-pill me-2"
                        >{{ $blog->created_at }}</span
                    >
                </div>
              </div>
            </a>
          </div>
          <h6 class="text-muted text-uppercase small pb-1"><a href="#!" class="text-reset">{{ $blog->category_id }}</a></h6>
          <h5 class="fw-bold mb-3"><a href="{{route('show_blog', $blog->slug)}}" class="text-reset">{{ $blog->name }}</a></h5>
        </div>
        @endforeach
      </div>
     
    </div>

   

  </section>
  <!--Section: Design Block-->

</div>
<!-- Container for demo purpose -->
      <div class="shadow multi-carousel" data-mdb-interval="9000">
        <div class="multi-carousel-inner">
          <div class="multi-carousel-item">
            <img
              src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/1.webp"
              alt="Table Full of Spices"
              class="w-100"
            />
          </div>
          <div class="multi-carousel-item">
            <img
              src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/2.webp"
              alt="Winter Landscape"
              class="w-100"
            />
          </div>
          <div class="multi-carousel-item">
            <img
              src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/3.webp"
              alt="View of the City in the Mountains"
              class="w-100"
            />
          </div>
          <div class="multi-carousel-item">
            <img
              src="https://mdbcdn.b-cdn.net/img/Photos/Thumbnails/Slides/4.webp"
              alt="Place Royale Bruxelles"
              class="w-100"
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          tabindex="0"
          data-mdb-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          tabindex="0"
          data-mdb-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
@endsection