@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New department</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('departments.index') }}"> Back</a>
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
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deparment Name:</strong>
                    <input type="text" name="department" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Manager:</strong>
                <select class="form-control select2" name="manager" id="manager">
                                        <option value="">Select Manager</option>

                                        @foreach($users as $user)
                                            <option value="{{ $user->paynumber }}">{{ $user->first_name }} {{ $user->last_name }} ({{ $user->email }}) - {{ $user->paynumber }}</option>
                                        @endforeach

                                    </select>
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Assistant Manager:</strong>
                    <select class="form-control select2" name="asst_manager" id="asst_manager">
                                        <option value="">Select Manager</option>

                                        @foreach($users as $user)
                                            <option value="{{ $user->paynumber }}">{{ $user->first_name }} {{ $user->last_name }} ({{ $user->email }}) - {{ $user->paynumber }}</option>
                                        @endforeach
                                    </select>         
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
@endsection