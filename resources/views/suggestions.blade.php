@extends('layouts.dashboard')

@section('dashcontent')



<div class="row mt-4 flex-center">
  @if ($suggestions->count() == 0)

    <div class="empty text-center p-2 font-weight-light">
        <p class="pt-4">We do not currently have any recipes matching items in your inventory :(</p>
    </div>


  @else
  <div class="empty text-center p-2 font-weight-bold">
      <h4 class="pt-4">We took a peek into your inventory, you already have some ingredients at home to start cooking! Here's some ideas for you  <i class="fas fa-utensils"></i></h4>

  </div>
@foreach($suggestions as $suggestion)


        <div class="col-lg-3 col-md-5 col-sm-8 card ml-3 mt-3">
          <a href="/recipes/{{$recipe->id}}"><img class="card-img-top mt-2" src="{{$suggestion->image}}" alt="Card image cap">


            <div class="card-header">

            {{$suggestion->title}}
          </div>
            <div class="card-body">
            {!! $suggestion->description ? $suggestion->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div>
        </div>
          <div class="card-footer bg-transparent">
            <p>Made with <i class="text-danger fas fa-heart"></i> by: {{$suggestion-> author}}</p>
          </div>
        </div>

@endforeach
@endif
</div>

@endsection
