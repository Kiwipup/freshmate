@extends('layouts.app')

@section('content')
<div class="col-12">



    <nav id="dashboard-nav" class="navbar navbar-expand-lg rounded-top border-bottom border-secondary">

    <ul class="list-inline">
      <li class="list-inline-item nav-item">
        <a class="inner-nav nav-link" href="/pantry">Inventory</a>
      </li>
      <li class="list-inline-item nav-item">
        <a class="inner-nav nav-link" href="/restock">Shopping List</a>
      </li>
      <li class="list-inline-item nav-item">
        <a class="inner-nav nav-link" href="/recipes">Your Recipes</a>
      </li>
      <li class="list-inline-item nav-item">
        <a class="inner-nav nav-link" href="/pantry/suggestions">Recipe Suggestions</a>
      </li>
    </ul>

</nav>

    @yield('dashcontent')

  </div>
@endsection
