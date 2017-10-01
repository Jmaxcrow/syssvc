<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telemarketer extends Model
{
    protected $table = 'telemarketing';
    protected $primaryKey = 'idTelemarketer';

    public function seller()
    {
    		$this->hasMany('App\Seller');
    }
}
