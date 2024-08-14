@extends('layouts.front')
@section('title')

@endsection
@section('content')
  <body>
   <!-- Topbar End -->

    <!-- Navbar Start -->
     @include('includes.navbar')
    <!-- Navbar End -->
<div
      class="container-fluid page-header py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">Recent Works</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="{{url('/')}}">Home</a>
            </li>
            <li class="breadcrumb-item text-primary active" aria-current="page">
           Recent Works
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
              <h6 class="text-body text-uppercase mb-2">Recent Works</h6>
              <h1 class="display-6 mb-0">
                Construction And Renovation Solutions
              </h1>
            </div>
          </div>
        </div>
     <div class="row g-4 justify-content-center">
         @foreach ($portfolios as $portfolio)
		  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item bg-light overflow-hidden h-100">
            <a href="{{ route('mywebsite.portfolios.work', $portfolio->id) }}">  
                 @if ($portfolio->images->count() > 0)
                @php
                    $lastImage = $portfolio->images->last();
                @endphp<img class="img-fluid" src="{{ asset($lastImage->image) }}" alt="" />
                  @endif
             </a> <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3">{{ $portfolio->title }}</h5>
                <p>
               <a href="{{ route('mywebsite.portfolios.work', $portfolio->id) }}">{{ str_limit($portfolio->description, 60) }} More...</a>
                </p>
               
              </div>
            </div>
          </div>
          @endforeach
         
     
        </div>
      </div>
    </div>


      @include('includes.footer')
    <!-- Footer End -->

 
    <!-- JavaScript Libraries -->
  
  </body>
</html>
