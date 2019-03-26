<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegCase extends Model
{
    protected $fillable = [
        'caseid','clientType', 'typeofwork', 'time2', 'amount', 'paymentmode'
    ];

}
