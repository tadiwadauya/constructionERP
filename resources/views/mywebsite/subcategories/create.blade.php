@extends('layouts.app')

@section('template_title')
    Category
@endsection

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/mywebsite/type') }}">Categories Home</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category
                            <div class="float-right">
                                <a href="{{ url()->previous() }}" class="btn btn-default">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    &lt;&lt; Return Back
                                </a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('mywebsite.subcategories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
                    </div>
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