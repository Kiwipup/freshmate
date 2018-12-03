@extends('layouts.dashboard')

@section('dashcontent')



@foreach($recipes as $suggestion)

<div class="row mt-4 flex-center">
  @if ($recipes->count() == 0)

    <div class="empty text-center p-2 font-weight-light">
        <p class="pt-4">We currently do not have any recipes matching items in your inventory :(</p>
    </div>

  @endif
        <div class="col-lg-3 col-md-5 col-sm-8 card ml-3 mt-3">
          <img class="card-img-top mt-2" src="{{$suggestion->image}}" alt="Card image cap">


            <div class="card-header">

            {{$suggestion->title}}
          </div>
            <div class="card-body">
            {!! $suggestion->description ? $suggestion->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div>
          <div class="card-footer bg-transparent">
            <p>Made with <i class="fas fa-heart"></i> by: {{$suggestion-> author}}</p>
          </div>
        </div>

@endforeach
</div>

@endsection
