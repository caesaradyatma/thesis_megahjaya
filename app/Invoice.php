<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $primaryKey = 'inv_id';
    protected $fillable = ['inv_number','inv_date','cust_id','inv_totPrice','inv_type','inv-status','inv_discount','user_id'];

    public function Invoice()
    {
      return $this->belongsTo('App\Customer','inv_id');
    }
}
