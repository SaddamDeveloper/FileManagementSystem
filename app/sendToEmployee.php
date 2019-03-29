<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendToEmployee extends Model
{
    protected $fillable = ['clientName', 'contactNo', 'deliveryDate', 'assignedEmployee', 'remarks'];
}
