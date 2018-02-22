<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utang extends Model
{
    protected $primaryKey = 'utg_id';

    public function outcome()
    {
      return $this->belongsTo('App\Outcome','utg_id');
    }
}
