<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telemarketer extends Model
{
    protected $table = 'telemarketing';
    protected $primarykey = 'idTelemarketer';

    public function seller()
    {
    		$this->hasMany('App\Seller');
    }
}
