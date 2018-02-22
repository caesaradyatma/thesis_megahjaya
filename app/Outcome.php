<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    protected $primaryKey = 'out_id';
    public function utang()
    {
      return $this->hasMany('App\Utang','utg_id');
    }
}
