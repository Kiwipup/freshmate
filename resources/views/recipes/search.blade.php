@extends('layouts.app')



@section('content')
<div class="row mt-4 flex-center">

@if ($recipes->count() == 0)

  <div class="empty text-center p-2 font-weight-light">
      <p class="pt-4">We currently do not have any recipes matching your search of "{{$q}}"...</p>
      <p>Try searching again!</p>
  </div>

@endif
@foreach ($recipes as $recipe)


        <div class="col-lg-4 col-md-8 col-sm-10 card ml-3 mt-3">
          <a href="/recipes/{{$recipe->id}}"><img class="card-img-top mt-2" src="{{$recipe->image}}" alt="Card image cap">


            <div class="card-header">

            {{$recipe->title}}
          </div>
            <div class="card-body text-truncate">
            {!! $recipe->description ? $recipe->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div></a>
          <div class="card-footer bg-transparent">
            <p>Made with <i class="fas fa-heart"></i> by: {{$recipe-> author}}</p>
          </div>
        </div>








@endforeach
</div>
@endsection
