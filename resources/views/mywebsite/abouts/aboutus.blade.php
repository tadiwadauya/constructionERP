@extends('layouts.front')
@section('title')

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
        <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="#">Home</a>
            </li>
            <li class="breadcrumb-item text-primary active" aria-current="page">
              About
            </li>
          </ol>
        </nav>
      </div>
    </div>

<iv class="container-xxl py-5">
      <div class="container">
          @foreach($abouts as $about)
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div
              class="position-relative overflow-hidden ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="{{ asset($about->image) }}"
                alt=""
                style="object-fit: cover"
              />
              <div
                class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                style="width: 200px; height: 200px"
              >
                <div
                  class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
                >
                  <h5 class="text-white">Live</h1>
                  <h2 class="text-white">Your</h2>
                  <h1 class="text-white mb-0">Style</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
           <div class="h-100">
              <div class="border-start border-5 border-primary ps-4 mb-5">
                <h6 class="text-body text-uppercase mb-2">About Us</h6>
                <h1 class="display-6 mb-0">
                 {{ $about->motto }}
                </h1>
              </div>
              <p>
                @foreach (preg_split("/(<\/?[a-z]+>)/i", $about->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
             @endforeach    </p>
			   <h6 class="text-body text-uppercase mb-2">Our Mission</h6>
              <p class="mb-4">
              {{ $about->mission }} </p>
			  
              <div class="border-top mt-4 pt-4">
			  <h6 class="text-body text-uppercase mb-2">Our Values</h6>
                <div class="row g-4">
                    @foreach ($about->values as $value)
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s">
                 
                    <i class="fa fa-check fa-2x text-primary flex-shrink-0 me-3">
                    </i>
                    <h6 class="mb-0">  {{ $value }}</h6>
                  </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
         @endforeach
      </div>
    </div>
 <!-- Team Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">Our Team</h6>
              <h1 class="display-6 mb-0">Meat Our Directors</h1>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
            <p class="mb-0">
             People behind our success
            </p>
          </div>
        </div>
        <div class="row g-5">
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item position-relative">
              <img class="img-fluid" src="{{asset('design/frontend/img/team-1.jpg')}}" alt="" />
              <div class="team-text bg-white p-4">
                <h5>Albert Hama Tsorai</h5>
                <span>Managing Director</span>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="team-item position-relative">
              <img class="img-fluid" src="{{asset('design/frontend/img/team-2.jpg')}}" alt="" />
              <div class="team-text bg-white p-4">
                <h5>Patricia Tsorai</h5>
                <span>Finance Director</span>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Team End -->
    

      @include('includes.footer')
    <!-- Footer End -->

 
    <!-- JavaScript Libraries -->
  
  </body>
</html>
