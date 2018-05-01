<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventorylist extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['item_name','item_type','personal_code','sku_code','item_quantity','item_measurement','item_price','item_minimum','item_status','item_delete'];
}
