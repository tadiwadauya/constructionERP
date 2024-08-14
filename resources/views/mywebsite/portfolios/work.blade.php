@extends('layouts.front')
@section('title')

@endsection
@section('content')
  <body>
   <!-- Topbar End -->

    <!-- Navbar Start -->
     @include('includes.navbar')
    <!-- Navbar End -->
     <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">{{ $portfolio->title }}</h6>
              <h1 class="display-6 mb-0">
                {{ $portfolio->description }}
              </h1>
              <p class="card-text"><strong>Category:</strong> {{ $portfolio->category }}</p>
            </div>
          </div>
        </div>
         <div class="card">
            <div class="card-body">
             <div class="row">
    @foreach ($portfolio->images as $image)
        <div class="col-sm-3">
            <a href="{{ asset($image->image) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                <img src="{{ asset($image->image) }}" alt="Portfolio Image" class="img-fluid mb-2" style="max-width: 100%; height: auto;">
            </a>
        </div>
    @endforeach
</div>
</div>