<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    protected $primaryKey = 'idOrigin';

    protected $fillable = ['name'];
}
