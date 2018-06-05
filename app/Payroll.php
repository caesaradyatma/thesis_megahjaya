<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['payroll_name','payroll_condition','payroll_amount','deleted_at','up_date'];
}
