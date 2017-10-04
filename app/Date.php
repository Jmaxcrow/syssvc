<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $primaryKey = 'idDate';

    protected $fillable = ['idClient', 'idTelemarketer', 'address', 'number_apt', 'city', 'state', 'zip_code', 'owner', 'guest', 'notes'];
}
