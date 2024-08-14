@extends('layouts.app')
@section('template_title')
    Website Management | services
@endsection
@section('content')
    <div class="container">
                    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">Services</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
             <li class="breadcrumb-item"><a href="{{ url('/mywebsite/services') }}">Services Home</a></li>
              <li class="breadcrumb-item active">Edit Service </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"> Edit Service </h1>
                           
                        <div class="float-right">
                             <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                << Return Back
            </a> </div>
                    </div>
                    <div class="card-body">
       
        <form action="{{ route('mywebsite.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $service->name }}" >
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="summernote" class="form-control" required>{{ $service->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image[]" id="image" class="form-control-file" multiple>
            </div>
             <label for="current_image">Current Images - tick to remove image</label><br>
        @if(is_array($service->image))
            @foreach($service->image as $image)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remove_images[]" value="{{ $image }}">
                    <label class="form-check-label" for="remove_image_{{ $loop->index }}">
                        <img src="{{ asset($image) }}" alt="Current service Image" width="200">
                    </label>
                </div>
            @endforeach
        @else
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remove_images[]" value="{{ $service->image }}">
                <label class="form-check-label" for="remove_image">
                    <img src="{{ asset($service->image) }}" alt="Current service Image" width="200">
                </label>
            </div>
        @endif
    </div></div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </div>
                </div>
            </div>
       
    
@endsection