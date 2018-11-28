@extends('layouts.dashboard')


@section('dashcontent')
<div class="d-flex justify-content-center">
  <div class="col-8">
    <a class="btn btn-success mb-2 mt-2" data-toggle="collapse" href="#addRecipe">Create Recipe <i class="ml-2 fas fa-plus"></i></a>
    <form id="addRecipe" class="collapse form clearfix p-3 mt-3 {{ $errors->any() ? 'show' : '' }}" action="" method="post">
        @csrf
        <!-- recipe prep time, cook time, image-->
        <div class="form-group">
            <label for="title" class="font-weight-bold">Title</label>
            <input type="text" class="form-control" id="recipe_title" name="title">
        </div>
        <div class="form-group">
            <label for="image" class="font-weight-bold">Attach an image</label>
            <input type="text" class="form-control" id="recipe_image" name="image" placeholder="https//:example.jpg">
        </div>

        <div class="form-group">
            <label for="prep_time" class="font-weight-bold">Prep Time</label>
            <input type="text" class="form-control" id="prep_time" name="prep_time">
        </div>
        <div class="form-group">
            <label for="cook_time" class="font-weight-bold">cook_time</label>
            <input type="text" class="form-control" id="recipe_name" name="cook_time" >
        </div>
        <div class="form-group">
            <label for="recipe_description" class="font-weight-bold">Recipe Description</label>
            <textarea type="text" class="form-control" id="recipe_description" name="description" placeholder="About this recipe..." ></textarea>
        </div>
        <div class="form-group multiple-form-group" data-max=50>
				<label>Ingredients</label>

				<div class="form-group input-group" id="ingredients">
					<input type="text" name="ingredients[]" class="form-control">
						<span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
						</button></span>
				</div>
			</div>
        <div class="form-group">
            <label for="instructions" class="font-weight-bold">Instructions</label>
            <textarea type="text" class="form-control" name="instructions" id="instructions"></textarea>
        </div>

        <button type="submit" class="btn btn-success float-left">Publish Recipe</button>

      </form>
</div>
</div>
<div class="row mt-4 flex-center">
  @if (Auth::user()->recipes->count() == 0)

    <div class="empty text-center p-2 font-weight-light">
        <p class="pt-4">You haven't created any recipes yet...</p>
        <p>Click the "Create Recipe" button to get started!</p>
    </div>

@endif
@foreach (Auth::user()->recipes as $recipe)


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








@endforeach
</div>
@endsection
