<!-- show.blade.php -->

@extends('layouts.app')

@section('content')


<div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">subcategories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
               <li class="breadcrumb-item"><a href="{{ url('/mywebsite/subcategories') }}">subcategories Home</a></li>
              <li class="breadcrumb-item active">subcategories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">  
                        <h1 class="card-title">
                       subcategories
                    </h1>
                      
                       <div class="float-right">
                              <a href="{{ url()->previous() }}" class="btn btn-default">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    << Return Back
                                </a>
                        </div>
                    </div>

                    
                        <div class="col-sm-5 col-6 text-larger">
                        <h4>Name:</h4>
                        </div>
                        <div class="col-sm-12">
                       
                <h3>{{ $type->name }}</h3>
            </div>
                        
        </div>
  
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection