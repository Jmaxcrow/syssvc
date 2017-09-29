<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $primarykey = 'idWorker';

    public function user()
    {
    		$this->hasOne('App\User');
    }
}
