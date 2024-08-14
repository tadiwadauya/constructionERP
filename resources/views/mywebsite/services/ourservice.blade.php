@extends('layouts.front')

@section('title')
  Service
@endsection

@section('content')
  <body>
    <!-- Spinner Start -->
    <!-- Topbar Start -->

    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('includes.navbar')
    <!-- Navbar End -->

    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Services</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="#">Home</a>
            </li>
            <li class="breadcrumb-item text-primary active" aria-current="page">
              Services
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Features Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4 mb-5">
              <h6 class="text-body text-uppercase mb-2">{{ $service->name }}</h6>
              <h1 class="display-6 mb-0">{{ $service->name }}</h1>
            </div>
            <p class="mb-5">
              <span style="font-family: Roboto, sans-serif; text-align: center; color: white !important;">
                {!! $service->description !!}
              </span>
            </p>
         <div class="row gy-5 gx-4">
            @if(is_array($service->image))
                @foreach($service->image as $image)
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="d-flex align-items-center mb-3">
          <img class="img-fluid" src="{{ asset($image) }}" alt="" />
        </div>
      </div>
    @endforeach
  @endif
</div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="position-relative overflow-hidden ps-5 pt-5" style="min-height: 900px;">
                @php
                    $images = $service->image;
                    $lastImage = null;
                    if (is_array($images) && count($images) > 0) {
                    $lastImage = end($images);
                    }
                @endphp
                <div class="image-container" style="height: 400px;">
                    @if (is_array($service->image) && count($service->image) > 0)
                    <img class="position-absolute w-100 h-100" src="@if ($lastImage) {{ asset($lastImage) }} @endif" alt="" style="object-fit: cover;">
                    @else
                    <img class="position-absolute w-100 h-100" src="{{ asset($service->image) }}" alt="service Image" style="object-fit: cover;">
                    @endif
                    <div class="position-absolute top-0 start-0 bg-white pe-3 pb-3" style="width: 200px; height: 200px;">
                    <div class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3">
                        <h1 class="text-white">Live</h1>
                        <h2 class="text-white">Your</h2>
                        <h5 class="text-white mb-0">Style</h5>
                </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features End -->

    <!-- Footer Start -->
    @include('includes.footer')
    <!-- Footer End -->

    <!-- Scroll Top Start -->
    <a href="#" class="scroll-top">
      <i class="bi bi-arrow-up-short"></i>
    </a>
    <!-- Scroll Top End -->

    <!-- JavaScript -->
   
  </body>
</html>
@endsection