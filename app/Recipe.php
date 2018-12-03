<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Recipe extends Model
{

  protected $casts = [
    'ingredients' => 'array',
    'instructions' => 'array',

];

  public function userRecipe() {
      return $this->belongsTo('App\User');

  }

  public function reviews() {
    return $this->hasMany('App\Review');
  }

  public function prettyUpdate() {

        $dt = new Carbon($this->created_at);
        if ($dt->isToday()) {
            return $dt->format('g:i:s a');
        }
        return $dt->format('n/j/y \\a\\t g:i:s a');

    }

    public function prettyUpdate2() {

          $dt = new Carbon($this->updated_at);
          if ($dt->isToday()) {
              return $dt->format('g:i:s a');
          }
          return $dt->format('n/j/y \\a\\t g:i:s a');

      }

      public function title() {

            $title = strtoupper($this->title);

            return $title;

        }
}
