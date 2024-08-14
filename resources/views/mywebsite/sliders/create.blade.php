@extends('layouts.app')
@section('template_title')
    Add slider
@endsection
@section('content')
    <div class="container">
         <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">Sliders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/sliders') }}">Sliders Home</a></li>   
               <li class="breadcrumb-item active">Add Sliders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
       <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
        <h4 >Add Slider
         <div class="float-right">
       <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                &lt;&lt; Return Back
            </a>  </div></h4>
 
        <form action="{{ route('mywebsite.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="service">Service</label>
                <input type="text" name="service" id="service" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file" required accept="image/*">
                <small class="text-muted">Dimensions: 677.33mm x 381mm (Width x Height)</small>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    
     </div>
            </div>
        </div>
    </div>
</div>

@endsection