<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inventory extends Model
{
  public function user() {
      return $this->belongsTo('App\User');
  }

  public function checkExpiration() {
        $check = new Carbon($this->is_expired);
        $exp = new Carbon($this->expiration_date);
        if ($exp->isPast()) {
            $check = true;
        }


    }
}
