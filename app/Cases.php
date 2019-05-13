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

    public function clientDetails2()
    {
        return $this->hasMany('App\ClientDetailsAnother');
    }

}
