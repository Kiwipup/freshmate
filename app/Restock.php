<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
  public function userRestock() {
      return $this->belongsTo('App\User');
  }
}
