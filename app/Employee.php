<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['emp_name','emp_age','emp_type','emp_gender','emp_contact','emp_address','emp_education','emp_deletedAt','user_id'];
}
