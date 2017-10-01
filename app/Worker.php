<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
		protected $table = 'workers';
    protected $primaryKey = 'idWorker';

    public function user()
    {
    		$this->hasOne('App\User');
    }
}
