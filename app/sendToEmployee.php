<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendToEmployee extends Model
{
    protected $fillable = ['caseid', 'assignedEmployee', 'mselected', 'remarks'];
    public $timestamps = false;
}
