<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inventory extends Model
{
  public function user() {
      return $this->belongsTo('App\User');
  }

  public function prettyUpdate() {

        $dt = new Carbon($this->expiration_date);
        if ($dt->isToday()) {
            return $dt->format('g:i:s a');
        }
        return $dt->format('n/j/y');

    }



}
