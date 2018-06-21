<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['date','desc','action','flow','trans_id','deleted_at'];

    public function actCode()
    {
      return $this->belongsTo('App\ActCode','act_code');
    }
}
