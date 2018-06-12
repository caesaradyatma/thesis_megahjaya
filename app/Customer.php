<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['cst_name','cst_company','cst_contact','user_id','cst_address','deleted_at'];
    public function customer()
    {
      return $this->hasMany('App\Invoice','inv_id');
    }
}
