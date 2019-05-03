<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendToDb extends Model
{
    protected $fillable = ['docs'];
    public $timestamps = false;

     public function sendEmployee(){
        return $this->belongsTo('App\RegCase');
    }

}
