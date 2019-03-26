<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class indClientDetails extends Model
{
    protected $fillable = [
        'clientid','clientName', 'contactNo', 'altContactNo', 'email', 'address', 'caseid'
    ];
}
