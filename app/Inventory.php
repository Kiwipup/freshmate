<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inventory extends Model
{

  protected $dates = [
       'expiration_date',

   ];


  public function user() {
      return $this->belongsTo('App\User');
  }

  public function prettyUpdate() {

        $dt = new Carbon($this->expiration_date);
        if ($dt->isToday()) {
            return 'Today';
        }
        return $dt->format('n/j/y');

    }



}
