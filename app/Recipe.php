<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  public function userRecipe() {
      return $this->belongsTo('App\User');
  }
}
