<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendToApproval extends Model
{
    protected $table = 'completedcase';
    public $timestamps = false;
}
