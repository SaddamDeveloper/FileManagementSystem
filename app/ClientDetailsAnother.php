<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetailsAnother extends Model
{
    protected $table = 'clientdetails2';
    public $timestamps = false;
    public function cases()
    {
        return $this->belongsTo('App\Cases');
    }
}
