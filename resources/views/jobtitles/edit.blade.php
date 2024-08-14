@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit JobTitle</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('jobtitles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('jobtitles.update',$jobtitle->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>JobTitle Name:</strong>
                    <input type="text" name="jobtitle" value="{{ $jobtitle->jobtitle }}" class="form-control" placeholder="jobtitle name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Department:</strong>
                    <input type="text" name="department" value="{{ $jobtitle->department }}" class="form-control" placeholder="department">
                    </div>
            </div>

           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
@endsection