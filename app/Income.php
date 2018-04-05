<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    //
    protected $primaryKey = 'in_id';
    public function piutang()
    {
      return $this->hasMany('App\Piutang','piut_id');
    }
}
