<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActCode extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['action','flow','deleted_at'];

    // public function Ledger(){
    //   return $this->hasMany('App\Ledger','act_code');
    // }
}
