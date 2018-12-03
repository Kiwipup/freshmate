@extends('layouts.showlayout')


@section('recipeshow')
<div class="flex-center">
<div class="col-lg-8 col-md-12 col-sm-12">
<div id="recipeShow" class="card ml-3 mt-3">
  <div class="card-header text-center bg-transparent">
    <div class="row jusitfy-content-center">
      <div class="col-8 text-center">

      <h1>{{$recipe->title}}</h1>
      <hr>
      <p>Made with <i class="fas fa-heart"></i> by: {{$recipe-> author}}</p>
      <p> Published: {{$recipe->prettyUpdate()}}</p>
      <p>"{!! $recipe->description ? $recipe->description : '<span class="text-black-50">(No Description)</span>' !!}"</p>

    </div>
  </div>
    <div class="card-img-top">
  <img class="img-fluid" src="{{$recipe->image}}" alt="Card image cap">

  </div>

  </div>
    <div class="card-body row">
      <div id="ingredients" class="col-lg-4 col-md-8 col-sm-8">
      <h3 class="mb-3">Ingredients</h3>

      @foreach($recipe->ingredients as $ingredient)
      <div id="ingredientBorder" class="row">
        <span class="mr-3"><button id="addButton" type="button" class="btn btn-sm" data-toggle="modal" data-target="#addIngredient"><i class="fas fa-plus-circle"></i></button></span> <p class="mt-2">{{$ingredient}}</p>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="addIngredient" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="ingredientModalForm" class="form clearfix p-3 mt-3" action="/restock/index" method="post">
                @csrf
                <div class="form-group">
                    <label for="item_name" class="font-weight-bold">Ingredient Name</label>
                    <input type="text" class="form-control" id="restock_name" name="item_name" value="{{$ingredient}}">
                </div>
                <div class="form-group">
                    <label for="item_description" class="font-weight-bold">Item Description (optional)</label>
                    <textarea type="text" class="form-control" id="restock_description" name="item_description" placeholder="About this item..." ></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity" class="font-weight-bold">Quantity</label>
                    <input type="number" class="form-control" name="quantity" min="1" max="50" id="quantity" >
                </div>

                <button type="submit" class="btn btn-success float-left">Add to shopping list</button>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>

      </div>
    </div>
      @endforeach

  </div>
  <hr>
  <div id="directions" class="col-lg-4 col-md-8 col-sm-8">
  <h3 class="mb-3">Directions</h3>

    {{$recipe->instructions}}
  </div>
  </div>
    <div class="row">
      <div class="col-5">
    <h3 class="ml-5 mt-5">Reviews ({{$recipe->reviews()->count()}}) <i class="far fa-comments"></i></h3>
      </div>
      <div class="col-3">
    <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#reviewModal">Review this recipe<i class="fas fa-check"></i></button>
      </div>
    </div>
    <hr>

    <!-- foreach will go here-->

    <!-- Modal -->
    <div class="modal fade" id="reviewModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="reviewModalForm" class="form clearfix p-3 mt-3" action="/recipes/{{ $recipe->id }}/reviews" method="post">
                @csrf
                <div class="form-group">
                    <label for="review" class="font-weight-bold">Your Review</label>
                    <textarea type="text" class="form-control" id="review" name="review" placeholder="Did you make any changes? Would you make this again?" ></textarea>
                </div>

                <button type="submit" class="btn btn-success float-left">Save</button>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>

      </div>
    </div>

    <div class="row justify-content-center">
      @foreach($recipe->reviews()->orderBy('updated_at', 'desc')->get() as $review)

      <div class="col-8 mb-3 bg-primary">
        <div class="ml-2">
          <p>{{$review->author}}</p>
          <p>{{$review->helpful}}</p>

          <p>{{$review->prettyUpdate()}}</p>
          <p>{{$review->review_text}}</p>
        </div>
    </div>

    @endforeach
  </div>
    @if ($recipe->reviews()->count() == 0)
    <div class="row d-flex justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-12 mb-3 empty text-center p-2 font-weight-light">
          <p class="pt-4">There are no reviews yet for this recipe...</p>
          <p >Click the "Review this recipe" button to make a review!</p>
      </div>
    </div>
  @endif



</div>
</div>
</div>
@endsection
