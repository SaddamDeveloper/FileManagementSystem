<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegCase extends Model
{
    protected $fillable = [
        'clientTypeSelection', 'typeofwork', 'amount', 'clientname', 'contactno', 'email', 'time2', 'altno', 'address'
    ];
}
