<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

  protected $casts = [
    'ingredients' => 'array',

];

  public function userRecipe() {
      return $this->belongsTo('App\User');

  }

  public function reviews() {
    return $this->hasMany('App\Review');
  }
}
