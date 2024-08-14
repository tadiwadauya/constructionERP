@extends('layouts.app')

@section('template_title')
    Services
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
               <li class="breadcrumb-item active">Service Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
        <h4>Add Service <div class="float-right">
            <a href="{{ url()->previous() }}" class="btn btn-default">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                &lt;&lt; Return Back
            </a>
        </div></h4>
        <form action="{{ route('mywebsite.services.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="image">Images</label>
                <div id="values-container">
                    <input type="file" name="images[]" id="image" class="form-control-file" required accept="image/*" multiple>
                </div>
                <button type="button" id="add-value" class="btn btn-secondary">+</button>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addValueButton = document.getElementById('add-value');
            const valuesContainer = document.getElementById('values-container');

            addValueButton.addEventListener('click', function() {
                const input = document.createElement('input');
                input.type = 'file';
                input.name = 'images[]';
                input.classList.add('form-control-file');
                input.accept = 'image/*';
                valuesContainer.appendChild(input);
            });
        });
    </script>
@endsection