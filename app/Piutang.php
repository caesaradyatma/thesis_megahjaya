<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    //
    protected $primaryKey = 'piut_id';

    public function outcome()
    {
      return $this->belongsTo('App\Income','piut_id');
    }
}
