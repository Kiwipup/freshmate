<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Restock extends Model
{
  public function userRestock() {
      return $this->belongsTo('App\User');
  }
}
