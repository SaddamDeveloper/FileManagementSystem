<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public function assignCase(){
        return $this->belongsTo('App\Users');
    }
}
