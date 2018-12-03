<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Review extends Model
{
  public function userReviews() {
      return $this->belongsTo('App\User');

  }

  public function recipe() {
      return $this->belongsTo('App\Recipe', 'recipe_id', 'id');

  }
  public function prettyUpdate() {

        $dt = new Carbon($this->created_at);
        if ($dt->isToday()) {
            return $dt->format('g:i:s a');
        }
        return $dt->format('n/j/y \\a\\t g:i:s a');

    }
}
