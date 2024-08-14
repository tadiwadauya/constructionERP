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

<!-- Carousel Start -->
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach($sliders->take(5) as $slider)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <img class="w-100" src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                  <h5 class="text-light text-uppercase mb-3 animated slideInDown">
                    {{ $slider->title }}
                  </h5>
                  <h1 class="display-2 text-light mb-3 animated slideInDown">
                    {{ $slider->service }}
                  </h1>
                  <ol class="breadcrumb mb-4 pb-2">
                    <li class="breadcrumb-item fs-5 text-light">
                      {{ $slider->description }}
                    </li>
                  </ol>
                  @if ($slider->title)
                    <ol class="breadcrumb mb-4 pb-2">
                    <li class="breadcrumb-item fs-5 text-light">
                      Live
                    </li>
                    <li class="breadcrumb-item fs-5 text-light">
                      Your
                    </li>
                    <li class="breadcrumb-item fs-5 text-light">
                      Style
                    </li>
                  </ol>
                    <a href="about.html" class="btn btn-primary py-3 px-5">More Details</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<!-- Carousel End -->
<!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        @foreach($abouts as $about)
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="position-relative overflow-hidden ps-5 pt-5 h-100"style="min-height: 400px">
              <img class="position-absolute w-100 h-100"src="{{ asset($about->image) }}"alt=""style="object-fit: cover" />
              <div class="position-absolute top-0 start-0 bg-white pe-3 pb-3"style="width: 200px; height: 200px">
                <div class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3">
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
                   <td>{{ $about->motto }}</td>
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
             @endforeach  
            </p>
			   <h6 class="text-body text-uppercase mb-2">Our Mission</h6>
              <p class="mb-4">
              <td>{{ $about->mission }}</td>
              </p>
			  
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
    <!-- About End -->
 
      <div class="container">
   <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">What we do</h6>
              <h1 class="display-6 mb-0">
                Our services
              </h1>
            </div>
          </div>
          <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
            <a class="btn btn-primary py-3 px-5" href="service.html">More Services</a>
          </div>
        </div></div>
    <!-- Facts Start -->
    <div class="container-fluid my-5 p-0">
	 
      <div class="row g-0">
         @php $serviceCount = 0; @endphp
           @foreach($services as $service)
              @php $serviceCount++; @endphp
            @if($serviceCount <= 4)
        <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.1s">
          <div class="position-relative">
            <img class="img-fluid w-100" @php
                                        $images = $service->image;
                                        $lastImage = null;

                                        if (is_array($images) && count($images) > 0) {
                                            $lastImage = end($images);
                                        }

                                @endphp
                                    @if(is_array($service->image) && count($service->image) > 0)
                                        <img class="img-fluid w-100" src="@if ($lastImage)
                                            {{ asset($lastImage) }}
                                        @endif" alt="service Image">
                                    @else
                                        <img class="img-fluid w-100" src="{{ asset($service->image) }}" alt="service Image">
                                    @endif 
            <div class="facts-overlay">
              <h1 class="display-1">0{{ $service->id }}</h1>
              <h4 class="text-white mb-3">{{ $service->name }}</h4>
           <p class="text-white">
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
              <a class="text-white small" href="{{ route('mywebsite.services.ourservice', $service->id) }}"
                >READ MORE<i class="fa fa-arrow-right ms-3"></i
              ></a>
            </div>
          </div>
        </div>
        @endif
		 @endforeach
      </div>
    </div>
    <!-- Facts End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4 mb-5">
              <h6 class="text-body text-uppercase mb-2">WE SERVE IN:</h6>
              <h1 class="display-6 mb-0">
                The following
              </h1>
            </div>
             @foreach($serves as $serve)
			 <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">{{ $serve->name }}</h6>
                </div>
            <p class="mb-5">
            @foreach (preg_split("/(<\/?[a-z]+>)/i", $serve->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach  </p>
                         @endforeach
           
             
              
           
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          
          <div
              class="position-relative overflow-hidden ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
             @foreach($serves as $serve)  
              <img
                class="position-absolute w-100 h-100"
                src="{{ asset($serve->image) }}"
                alt=""
                style="object-fit: cover"
              />
              @endforeach
              <div
                class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                style="width: 200px; height: 200px"
              >
                <div
                  class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
                >
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
    <!-- Features End -->

    <!-- works Start -->
 
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
      <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
        <a class="btn btn-primary py-3 px-5" href="{{url('/works')}}">More Works</a>
      </div>
    </div>
    <div class="row g-4 justify-content-center">
      @php $count = 0; @endphp
      @foreach ($portfolios->sortByDesc('created_at') as $portfolio)
        @if ($count < 8)
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item bg-light overflow-hidden h-100">
              <a href="spar.html">  
                @if ($portfolio->images->count() > 0)
                  @php
                    $lastImage = $portfolio->images->last();
                  @endphp
                  <img class="img-fluid" src="{{ asset($lastImage->image) }}" alt="" />
                @endif
              </a>
              <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3">{{ $portfolio->title }}</h5>
                <p>
                  <a href="spar.html">{{ str_limit($portfolio->description, 60) }} More...</a>
                </p>
              </div>
            </div>
          </div>
          @php $count++; @endphp
        @endif
      @endforeach
    </div>
  </div>
</div>
</div>
    <!-- works End -->

    <!-- contact us Start -->
    <div
      class="container-fluid appointment my-5 py-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-5 col-md-6 wow fadeIn" data-wow-delay="0.3s">
            <div class="border-start border-5 border-primary ps-4 mb-5">
              <h6 class="text-white text-uppercase mb-2">Get in touch</h6>
              <h1 class="display-6 text-white mb-0">
               HELENSVALE GROUP OF COMPANIES
              </h1>
			   <a href="http://www.helensvalecleaning.co.zw" class="text-warning">Helensvale Cleaning</a>  |
			    <a href="http://www.helensvalefiretechnologies.co.zw" class="text-warning">Helensvale fire technology</a>
            </div>
            @foreach($contacts as $contact)
            <p class="text-white mb-0">
             <b> <i class="fa fa-map-marker-alt me-3"></i></b>   @foreach (preg_split("/(<\/?[a-z]+>)/i", $contact->address, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach
            </p>
				
			<p class="text-white mb-0">
             <b><i class="fa fa-envelope me-3"></i></b> {{ $contact->email }}
				 
            </p>
			<p class="text-white mb-0">
             <b><i class="fa fa-envelope me-3"></i></b> purchasing@helensvaleconstruction.co.zw
				 
            </p>
			<p class="text-white mb-0">
             <b><i class="fa fa-phone-alt me-3"></i></b> {{ $contact->phonenumber }}
            </p>
			
          </div>
             @endforeach
          <div class="col-lg-7 col-md-6 wow fadeIn" data-wow-delay="0.5s">
            <form>
              <div class="row g-3">
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control bg-dark border-0"
                      id="gname"
                      placeholder="Gurdian Name"
                    />
                    <label for="gname">Your Name</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input
                      type="email"
                      class="form-control bg-dark border-0"
                      id="gmail"
                      placeholder="Gurdian Email"
                    />
                    <label for="gmail">Your Email</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control bg-dark border-0"
                      id="cname"
                      placeholder="Child Name"
                    />
                    <label for="cname">Your Mobile</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control bg-dark border-0"
                      id="cage"
                      placeholder="Child Age"
                    />
                    <label for="cage">Service Type</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea
                      class="form-control bg-dark border-0"
                      placeholder="Leave a message here"
                      id="message"
                      style="height: 100px"
                    ></textarea>
                    <label for="message">Message</label>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit">
                    Contact us
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Appointment End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4 mb-5">
              <h6 class="text-body text-uppercase mb-2">Testimonial</h6>
              <h1 class="display-6 mb-0">What Our Happy Clients Say!</h1>
            </div>
            <p class="mb-4">
            Check what some of our clients have to say about us
            </p>
            <div class="row g-4">
              <div class="col-sm-6">
                <div class="d-flex align-items-center mb-2">
                  <i class="fa fa-users fa-2x text-primary flex-shrink-0"></i>
                  <h1 class="ms-3 mb-0">123+</h1>
                </div>
                <h5 class="mb-0">Happy Clients</h5>
              </div>
              <div class="col-sm-6">
                <div class="d-flex align-items-center mb-2">
                  <i class="fa fa-check fa-2x text-primary flex-shrink-0"></i>
                  <h1 class="ms-3 mb-0">123+</h1>
                </div>
                <h5 class="mb-0">Projects Done</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
            <div class="owl-carousel testimonial-carousel">
              <div class="testimonial-item">
               
                <p class="fs-5">
                  Your team was extremely professional throughout the project. We value so much all your attention to detail. We will certainly contract with you again.
                </p>
                <div
                  class="bg-primary mb-3"
                  style="width: 60px; height: 5px"
                ></div>
                <h5>Sunway Prefab housesl</h5>
              </div>
              <div class="testimonial-item">
           
                <p class="fs-5">
                 They demostrated a character of good standing when they carried out construction of Adlin Cluster homes.
                </p>
                <div
                  class="bg-primary mb-3"
                  style="width: 60px; height: 5px"
                ></div>
                <h5>Adylin Cluster homes</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    @include('includes.footer')
    <!-- Footer End -->

 
    <!-- JavaScript Libraries -->
  
  </body>
</html>
