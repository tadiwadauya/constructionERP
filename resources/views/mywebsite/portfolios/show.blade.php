<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
               <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">Portfolio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/portfolios') }}">Portifolio Home</a></li>
              <li class="breadcrumb-item active">Portfolio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
        <h1>Portfolio Details<div class="float-right">
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                &lt;&lt; Return Back
            </a>
        </div></h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $portfolio->title }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $portfolio->description }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $portfolio->category }}</p>
                <p class="card-text"><strong>Images:</strong></p>
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
        </div>
    </div>
     </div>
      </div>
       </div>
        </div>
        
@endsection