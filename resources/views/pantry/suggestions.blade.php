@extends('layouts.dashboard')

@section('dashcontent')



@foreach($suggestions as $suggestion)

<div class="row mt-4 flex-center">

        <div class="col-3 card ml-3 mt-3">
          <img class="card-img-top mt-2" src="{{$recipe->image}}" alt="Card image cap">


            <div class="card-header">

            {{$suggestion->title}}
          </div>
            <div class="card-body">
            {!! $suggestion->description ? $suggestion->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div>
          <div class="card-footer bg-transparent">
            <p>Last Updated: {{$suggestion-> updated_at}}</p>
            <p>Made with love by: {{$suggestion-> author}}</p>
          </div>
        </div>

@endforeach
</div>

@endsection
