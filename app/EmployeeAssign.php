<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAssign extends Model
{
    protected $table = 'send_to_employees';

    public function employee(){
        return $this->hasMany('App\Employee');
    }
}
