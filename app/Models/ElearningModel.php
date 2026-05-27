<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class ElearningModel extends Model
{
    public $timestamps = false;

    protected $guarded = [];
}
