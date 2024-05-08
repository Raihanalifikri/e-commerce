@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
    {{-- <div class="card">
        <div class="card-body">
            <h5 class="card-title">With Home Icon</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>
        </div>
    </div> --}}

    <div class="section dashboard">
      <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card">
  
  
          <div class="card-body">
            <h5 class="card-title">Dashboard <span> <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i> | {{ Auth::user()->role }}</span></span></h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>{{ Auth::user()->name }}</h6>
                <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span>
  
              </div>
            </div>
  
          </div>
        </div>
  
      </div><!-- End Customers Card -->
    </div>
    

    <div class="section dashboard">
        <div class="row">
            <div class="col-md-4">
                {{-- Category card --}}
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Category</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $category }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- End Category card --}}
            </div>
            <div class="col-md-4">
                 {{-- Product card --}}
                 <div class="card info-card sales-card">

                  <div class="card-body">
                      <h5 class="card-title">Product</h5>

                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-cart-check-fill"></i>
                          </div>
                          <div class="ps-3">
                              <h6>{{ $product }}</h6>
                          </div>
                      </div>
                  </div>

              </div>
              {{-- End Product card --}}
            </div>
            <div class="col-md-4">
                 {{-- User card --}}
                 <div class="card info-card sales-card">

                  <div class="card-body">
                      <h5 class="card-title">User</h5>

                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-person-fill"></i>
                          </div>
                          <div class="ps-3">
                              <h6>{{ $user }}</h6>
                          </div>
                      </div>
                  </div>

              </div>
              {{-- End User card --}}
            </div>
        </div>
    </div>


@endsection
