<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetails extends Model
{
    protected $table = 'client_details';
    public function cases()
    {
        return $this->belongsTo('App\Cases');
    }
}
