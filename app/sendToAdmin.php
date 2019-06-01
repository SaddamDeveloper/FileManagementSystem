<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendToAdmin extends Model
{
    protected $table = 'toAdmin';

    public $timestamps = false;

    // public function sendAdmin(){
    //     return $this->belongsTo('App\sendToEmployee');
    // }
}
