<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  public function userReviews() {
      return $this->belongsTo('App\User');

  }

  public function recipe() {
      return $this->belongsTo('App\Recipe', 'recipe_review_id', 'id');

  }
}
