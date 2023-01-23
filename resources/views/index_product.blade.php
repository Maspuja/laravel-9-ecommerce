@extends('layouts.header')

@section('content')
    <h1>Product</h1>
    {{-- <a href="{{ route('create_product') }}" class="btn btn-primary py-1 mb-2">+ ADD PRODUCT</a> --}}

    <!-- Section: Products -->
    <section class="">
        <div class="row gx-xl-5 justify-content-center">
            @foreach ($products as $product)
          <div class="col-lg-4 col-6 mb-4 py-1 card">
            <!-- Product card -->
            <div>
              <!-- Product image -->
              <div
                   class="
                   bg-image hover-zoom
                          shadow-4-soft
                          rounded-6
                          mb-4
                          overflow-hidden
                          d-block
                          "
                   data-ripple-color="light"
                   >
                <img
                     src="{{ url('storage/'.$product->image) }}"
                     class="w-100"
                     alt=""
                     />
                <a href="{{ route('show_product', $product)}}">
                  <div class="mask">
                    <div
                         class="
                                d-flex
                                justify-content-start
                                align-items-end
                                h-100
                                p-3
                                "
                         >
                      <span class="badge badge-dark rounded-pill me-2"
                            >{{ $product->stock }}</span
                        >
                    </div>
                  </div>
                  <div class="hover-overlay hover-zoom">
                    <div
                         class="mask"
                         style="background-color: hsla(0, 0%, 98.4%, 0.09)"
                         ></div>
                  </div>
                </a>
              </div>

              <!-- Product content -->
              <a href="" class="px-3 text-reset d-block">
                <p class="fw-bold mb-2">{{ $product->name}}</p>
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
                <h5 class="mb-2">
                  RP. {{ number_formAt($product->price) }}
                </h5>
              </a>
              <!-- Product content -->
            </div>
            <!-- Product card -->
          </div>
          @endforeach
          </div>
          {{ $products->links('pagination::bootstrap-5') }}
        </div>
      </section>
      <!-- Section: Products -->

    
    {{-- <table>
        <tr>
            <th>No</th>
            <th>image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        
        <?php $i=1; ?>
         @foreach ($products as $product)
        <tr>
            <td>{{ $i++; }}</td>
            <td><img src="{{ url('storage/'.$product->image) }}" height="100px" width="100px"> </td>    
            <td><a href="{{ route('show_product', $product)}}"> {{ $product->name }} </a></td>
            <td><form action="{{ route('delete_product', $product) }}" method="post">
                @method('delete')
                @csrf
                <button>Delete</button>
                </form> 
            </td>
        </tr>
         @endforeach
            
    </table> --}}
    
@endsection