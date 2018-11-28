<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

        <!-- Styles -->

    </head>
    <body class="pretty">

      <div id="nav" class="shrink flex-center full-height">
          @if (Route::has('login'))
              <div  class="top-right links">
                  @auth
                      <a href="{{ url('pantry') }}">My Dashboard</a>
                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif
        </div>



        <div id="app">



            <div class="container text-center">


              <div class="title flex-center">
                <div class="col-6">
                  FreshMate
                </div>
              </div>
              <div class="title-icon flex-center">
                <div class="col-3">
                <h3 class="bg-success">Browse our recipes</h3>
                <a href="#publicRecipes" ><i class="fas fa-arrow-circle-down"></i></a>
              </div>
              </div>



              <div id="publicRecipes" class="py-4 page">
                <div class="col-12">
                <div class="text-left">
                  <div class="row mt-4 flex-center">
                  @foreach (Auth::user()->recipes as $recipe)


                          <div class="col-5 card ml-3 mt-3">
                            <a href="/recipes/{{$recipe->id}}"><img class="card-img-top mt-2" src="{{$recipe->image}}" alt="Card image cap">


                              <div class="card-header">

                              {{$recipe->title}}
                            </div>
                              <div class="card-body text-truncate">
                              {!! $recipe->description ? $recipe->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
                            </div></a>
                            <div class="card-footer bg-transparent">
                              <p>By {{$recipe->author}}</p>
                            </div>
                          </div>








                  @endforeach
                </div>
              </div>
            </div>
            </div>
          </div>





      </div>










    </body>
</html>
