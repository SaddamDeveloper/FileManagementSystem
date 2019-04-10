<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = "cases";

    public function clientDetails()
    {
        return $this->hasMany('App\ClientDetails');
    }

}
