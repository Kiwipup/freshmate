<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuggestionsController extends Controller
{
    public function suggestions() {
      return view('recipes.suggestions');
    }
}
