<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    protected $primarykey = 'idOrigin';

    protected $fillable = ['name'];
}
