<!-- show.blade.php -->

@extends('layouts.app')

@section('content')


<div class="container">
            <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/mywebsite') }}">Website Dashbord</a></li>
              <li class="breadcrumb-item active">posts</li>
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
                       posts
                    </h1>
                      
                       <div class="float-right">
                              <a href="{{ url()->previous() }}" class="btn btn-default">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    << Return Back
                                </a>
                        </div>
                    </div>

                    <div class="col-sm-5 col-6 text-larger">
                      <h4>Title: 
                        </h4>
                    </div> 
                      <div class="col-sm-12">
                        <p>{{ $post->name }}</p>
                        </div>
                         <div class="col-sm-5 col-6 text-larger">
                      <h4>Category
                        </h4>
                    </div> 
                          <div class="col-sm-12">
                        <p>   @if ($category)
                {{ $category->name }}
            @else
                category not found
            @endif</p>
                        <div class="col-sm-5 col-6 text-larger">
                        <h4>Description:</h4>
                        </div>
                        <div class="col-sm-12">
                        @foreach (preg_split("/(<\/?[a-z]+>)/i", $post->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach
                         </div>
                          @php 
                $user = \App\Models\User::find($post->created_by);
                @endphp
                <div class="col-sm-5 col-6 text-larger">
                      <h4>Posted By: 
                        </h4>
                    </div> 
                          <div class="col-sm-12"><p>@if ($user)
                {{ $user->first_name }} {{ $user->last_name }}
            @else
                User not found
            @endif
</p>
        </div>
            <br>
            <div class="col-sm-5 col-6 text-larger">
                      <h4>Image: 
                        </h4>
                    </div> 
                          <div class="col-sm-12">
                        <img src="{{ asset($post->image) }}" alt="post Image" width="300">
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection