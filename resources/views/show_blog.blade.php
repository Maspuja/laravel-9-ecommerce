@extends('layouts.header')

@section('content')


    <!--Main layout-->
    <main class="mt-2 mb-2">
      <div class="container">
        <!--Grid row-->
        <div class="row gx-lg-5">
          <!--Grid column-->
          <h1 class="text-uppercase">{{ $blog->name}}</h1>
          <div class="card p-1 col-lg-8 mb-4">
            
            <!--Section: Post data-->
            <section class="border-bottom mb-4">
              <div class="bg-image hover-overlay hover-zoom ripple rounded-2 mb-4" data-mdb-ripple-color="light">
              <img
                src="{{ url('storage/'.$blog->image) }}"
                class="img-fluid w-100 shadow-1-strong mb-2"
                alt="foto"
              />
              </div>

              <div class="row align-items-center mb-4">
                <div class="col-lg-8 text-center text-lg-start">
                  <img
                    src="https://mdbootstrap.com/img/Photos/Avatars/img (23).jpg"
                    class="rounded-circle me-2"
                    height="35"
                    alt=""
                    loading="lazy"
                  />
                  <span> Published <u>{{ $blog->created_at }}</u></span>
                </div>
              </div>
            </section>
            <!--Section: Post data-->

            <!--Section: Text-->
            <section>
              <p>
                {!!$blog->description!!}
              </p>

              <p class="note note-light">
                <strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur
                adipisicing elit. Optio odit consequatur porro sequi ab
                distinctio modi. Rerum cum dolores sint, adipisci ad veritatis
                laborum eaque illum saepe mollitia ut voluptatum.
              </p>
            </section>
            <!--Section: Text-->

            

            <!--Section: Comments-->
            <section class="mb-5">
              <div id="disqus_thread" class="mt-3 card card-header"></div>
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

            </section>
            <!--Section: Comments-->
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 mb-4">
            <!--Section: Sidebar-->
            <section class="sticky-top" style="top: 20px">
            
            <!-- Section: Newsletter form -->
            <section class="shadow-4 rounded-2 p-2">
            
              @foreach ($blogss as $blog)
              <div class="card shadow mb-3 p-1">
                <div class="bg-image hover-overlay hover-zoom ripple rounded-2 mb-4" data-mdb-ripple-color="light">
                <a href="{{ route('show_blog', $blog) }}">  
                  <img class="w-100" src="{{ url('storage/'.$blog->image) }}"
                  style="height: 227px; object-fit: cover;" alt="Image placeholder">
                </div>
                  <p>{{ $blog->name }}</p>
                </a>
              </div>
              
              @endforeach
            
            </section>
            <!-- Section: Newsletter form -->
            
            </section>
            <!--Section: Sidebar-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
    </main>
    <!--Main layout-->

   
  


   

@endsection