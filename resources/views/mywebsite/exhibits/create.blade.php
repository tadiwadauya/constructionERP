@extends('layouts.app')

@section('content')
    <div class="container">

           <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
                        <h1 class="m-0">Portfolio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
                             <li class="breadcrumb-item">  <a href="{{ url('mywebsite/exhibits') }}">{{ __('Gallarey') }}</a></li>
                            <li class="breadcrumb-item active">Add Images</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


     <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            {{ __('Add Images') }}
                     
                            <div class="float-right">
                                <a href="{{ url('mywebsite/exhibits') }}">{{ __('gallarey') }}</a>
                            </div>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mywebsite.exhibits.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>

                                <div class="col-md-6">
                                    <input id="images" type="file" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple required>

                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection