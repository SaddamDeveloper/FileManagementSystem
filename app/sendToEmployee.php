<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendToEmployee extends Model
{
    protected $fillable = ['caseid', 'assignedEmployee', 'helper', 'docs'];
    public $timestamps = false;

    public function sendEmployee(){
        return $this->belongsTo('App\RegCase');
    }
    public function sendAdminData(){
        return $this->hasMany('App\sendToAdmin');
    }

}
