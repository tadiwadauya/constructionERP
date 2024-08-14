<!-- edit.blade.php -->

@extends('layouts.app')
@section('template_title')
    Website Management
@endsection
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
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/sliders') }}">Slider Home</a></li>
              <li class="breadcrumb-item active">Edit Sliders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
        <h4>Edit Slider <div class="float-right">
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                &lt;&lt; Return Back
            </a>
        </div></h4>
        <form action="{{ route('mywebsite.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $slider->title }}" >
            </div>
            <div class="form-group">
                <label for="service">Service</label>
                <input type="text" name="service" id="service" class="form-control" value="{{ $slider->service }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" >{{ $slider->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="current_image">Current Image</label><br>
                <img src="{{ asset($slider->image) }}" alt="Current Slider Image" width="200">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </div>
    </div>
    </div>
@endsection