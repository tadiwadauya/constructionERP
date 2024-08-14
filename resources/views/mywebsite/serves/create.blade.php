@extends('layouts.app')
@section('template_title')
    We serve in
@endsection
@section('content')
    <div class="container">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">Serve In</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/serves') }}">Serve In Home</a></li>
              <li class="breadcrumb-item active">Add sector</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">  
        <h4>Add sectors you serve in:  
            <div class="float-right">
              <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                 << Return Back
               </a>
             </div>
         </h4>
        <form action="{{ route('mywebsite.serves.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
           
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="summernote" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
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