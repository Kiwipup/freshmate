@extends('layouts.app')

@section('content')
<div class="col-12">


    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-top border-bottom border-secondary">

    <ul id="dashboard-nav" class="list-inline">
      <li class="list-inline-item nav-item">
        <a class="nav-link" href="/pantry">Inventory</a>
      </li>
      <li class="list-inline-item nav-item">
        <a class="nav-link" href="#">Restock</a>
      </li>
      <li class="list-inline-item nav-item">
        <a class="nav-link" href="#">Your Recipes</a>
      </li>
    </ul>

</nav>

    @yield('dashcontent')

  </div>
@endsection
