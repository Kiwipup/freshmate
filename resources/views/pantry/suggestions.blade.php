@extends('layouts.dashboard')

@section('dashcontent')
@foreach ($recipes as $recipe)

@if (Auth::user()->$items == $recipe->ingredients)
<div class="row mt-4 flex-center">

        <div class="col-3 card ml-3 mt-3">
          <img class="card-img-top mt-2" src="{{$recipe->image}}" alt="Card image cap">


            <div class="card-header">

            {{$recipe->title}}
          </div>
            <div class="card-body">
            {!! $recipe->description ? $recipe->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div>
          <div class="card-footer bg-transparent">
            <p>Last Updated: {{$recipe-> updated_at}}</p>
          </div>
        </div>
        @else



            <div class="empty text-center p-2 font-weight-light">
                <p class="pt-4">Your inventory is empty...</p>
                <p >Click the "Add Item" button to get started!</p>
            </div>

            @endif






@endforeach
</div>
@endsection
