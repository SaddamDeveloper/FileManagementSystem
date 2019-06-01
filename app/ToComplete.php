<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToComplete extends Model
{
    protected $table = 'completedcase';

    public $timestamps = false;
}
