@extends('layouts.front')
@section('title')
services
@endsection
@section('content')
  <body>
    <!-- Spinner Start -->
    <!-- Topbar Start -->

    <!-- Topbar End -->

    <!-- Navbar Start -->
     @include('includes.navbar')
    <!-- Navbar End -->
<div
      class="container-fluid page-header py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
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

    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">Our Services</h6>
              <h1 class="display-6 mb-0">
                Construction And Renovation Solutions
              </h1>
            </div>
          </div>
          <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
            <a class="btn btn-primary py-3 px-5" href="">More Services</a>
          </div>
        </div>
        <div class="row g-4 justify-content-center">
             @foreach($services as $service)
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item bg-light overflow-hidden h-100">
            @php
                                        $images = $service->image;
                                        $lastImage = null;

                                        if (is_array($images) && count($images) > 0) {
                                            $lastImage = end($images);
                                        }

                                @endphp
                                    @if(is_array($service->image) && count($service->image) > 0)  
            <img class="img-fluid" src="@if ($lastImage)
                                            {{ asset($lastImage) }}
                                        @endif" alt="" />
             @else
            <img src="{{ asset($service->image) }}" alt="" >
             @endif
              <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3">{{ $service->name }}</h5>
                <p>
                  @if(is_array($service->description))
        @foreach ($service->description as $part)
            <span style="font-family: Roboto, sans-serif; text-align: center; color: white !important;">
                {!! is_array($part) ? implode(' ', array_slice($part, 0, 12)) : implode(' ', array_slice(explode(' ', $part), 0, 12)) !!}
                @if(str_word_count($part) > 12) ...
                @endif
            </span>
        @endforeach
    @else
        <span style="font-family: Roboto, sans-serif; text-align: center; color: white !important;">
            {!! implode(' ', array_slice(explode(' ', $service->description), 0, 12)) !!}
            @if(str_word_count($service->description) > 12) ...
            @endif
        </span>
    @endif
                </p>
                
                                        
                <a href="{{ route('mywebsite.services.ourservice', $service->id) }}" class="text-white small"
                >READ MORE<i class="fa fa-arrow-right ms-3"></i
              ></a>
              </div>
            </div>
          </div>
         
        @endforeach
        </div>
      </div>
    </div>
    <!-- Service End -->
    
      @include('includes.footer')
    <!-- Footer End -->

 
    <!-- JavaScript Libraries -->
  
  </body>
</html>
