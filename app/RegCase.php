<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegCase extends Model
{
    protected $fillable = ['caseid','clientType', 'typeofwork', 'time2',	'amount', 'paymentmode'];
    public $incrementing = false;

    public function clientDetails(){
        return $this->hasMany('App\indClientDetails');
    }

}
