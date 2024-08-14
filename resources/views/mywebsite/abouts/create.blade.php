@extends('layouts.app')
@section('template_title')
    Add about us
@endsection
@section('content')
    <div class="container">
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
              <li class="breadcrumb-item active">Edit About Us</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
        <h1>Create About Us
            <div class="float-right">
              <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                 << Return Back
               </a>
             </div>
        </h1>
        <form action="{{ route('mywebsite.abouts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="motto">Motto</label>
                <input type="text" name="motto" id="motto" class="form-control">
            </div>
            <div class="form-group">
                <label for="values">Values</label>
                <div id="values-container">
                    <input type="text" name="values[]" class="form-control">
                </div>
                <button type="button" id="add-value" class="btn btn-secondary">+</button>
            </div>
        
            <div class="form-group">
                <label for="mission">Mission</label>
                <textarea name="mission"  class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="vision">Vision</label>
                <input type="text" name="vision" id="vision" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="summernote" class="form-control" required></textarea>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addValueButton = document.getElementById('add-value');
            const valuesContainer = document.getElementById('values-container');

            addValueButton.addEventListener('click', function() {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'values[]';
                input.classList.add('form-control');
                valuesContainer.appendChild(input);
            });
        });
    </script>
@endsection