<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">About Us</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/abouts') }}">About Us Home</a></li>
              <li class="breadcrumb-item active"> About Us</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                                   <div class="float-right">
              <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                 << Return Back
               </a>
             </div>
                    <br>
                        <h1 class="card-title">About Us</h1>
                    </div>
                    <div class="card-body">
                        <h4>Motto: {{ $about->motto }}</h4>
                        <h4>Values: {{ $about->values }}</h4>
                        <h4>Mission: {{ $about->mission }}</h4>
                        <h4>Vision: {{ $about->vision }}</h4>
                        <h4>Description:</h4>
                        @foreach (preg_split("/(<\/?[a-z]+>)/i", $about->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach
                        <img src="{{ asset($about->image) }}" alt="about Image" width="300">
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection