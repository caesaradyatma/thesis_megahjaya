<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    //
    protected $primaryKey = 'in_id';
    protected $fillable = ['in_type','in_name','in_amount','in_date','in_desc','user_id'];
    public function piutang()
    {
      return $this->hasMany('App\Piutang','piut_id');
    }
}
