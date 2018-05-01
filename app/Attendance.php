<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['atd_date','atd_ids'];
}
