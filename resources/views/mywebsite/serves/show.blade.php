<!-- show.blade.php -->

@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
           
            <div class="col-12">

                <div class="card">
                    <div class="card-header text-white  bg-success">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                           Sector we serve in
                              <a href="{{ url()->previous() }}" class="btn btn-default">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    << Return Back
                                </a>
                        </div>
                    </div>

                    <div class="col-sm-5 col-6 text-larger">
                      <h4>Motto: 
                        </h4>
                    </div> 
                      <div class="col-sm-12">
                        <p>{{ $serve->name }}</p>
                        </div>
                        <div class="col-sm-5 col-6 text-larger">
                        <h4>Description:</h4>
                        </div>
                        <div class="col-sm-12">
                        @foreach (preg_split("/(<\/?[a-z]+>)/i", $serve->description, -1, PREG_SPLIT_DELIM_CAPTURE) as $part)
                            @if (stripos($part, "<b>") !== false)
                                <b>{!! strip_tags($part, '<b>') !!}</b>
                            @elseif (stripos($part, "<p>") !== false)
                                <p>{!! strip_tags($part, '<p>') !!}</p>
                            @else
                                {!! $part !!}
                            @endif
                        @endforeach
                         </div>
                          <div class="col-sm-12">
                        <img src="{{ asset($serve->image) }}" alt="serve Image" width="300">
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection