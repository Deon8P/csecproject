<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Leave extends Model
{
    protected $fillable = [
        'emp-username', 'leave_type', 'startDate', 'endDate', 'period', 'status' 
    ];



}
