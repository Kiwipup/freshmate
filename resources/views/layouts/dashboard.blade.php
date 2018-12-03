@extends('layouts.app')

@section('content')
<div class="col-12">


    <nav id="dashboard-nav" class="navbar navbar-expand-lg rounded-top border-bottom border-primary">

    <ul class="list-inline">
      <li class="list-inline-item nav-item">
        @if(str_contains(url()->current(), '/pantry'))
        <a class="inner-nav nav-link border-bottom border-success" href="/pantry">Inventory</a>
        @else
        <a class="inner-nav nav-link" href="/pantry">Inventory</a>
        @endif
      </li>
      <li class="list-inline-item nav-item">
        @if(str_contains(url()->current(), '/restock'))
        <a class="inner-nav nav-link border-bottom border-success" href="/restock">Shopping List</a>
        @else
        <a class="inner-nav nav-link" href="/restock">Shopping List</a>
        @endif
      </li>
      <li class="list-inline-item nav-item">
        @if(str_contains(url()->current(), '/recipes'))
        <a class="inner-nav nav-link border-bottom border-success" href="/recipes">Your Recipes</a>
        @else
        <a class="inner-nav nav-link" href="/recipes">Your Recipes</a>
        @endif
      </li>
      <li class="list-inline-item nav-item">
        @if(str_contains(url()->current(), '/suggestions'))
        <a class="inner-nav nav-link border-bottom border-success" href="/suggestions">Recipe Suggestions</a>
        @else
        <a class="inner-nav nav-link" href="/suggestions">Recipe Suggestions</a>
        @endif
      </li>
    </ul>

</nav>

    @yield('dashcontent')

  </div>
@endsection
