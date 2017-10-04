<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
	protected $table = 'sellers';
    protected $primaryKey = 'idSeller';


    /**
    * the next function means exists a seller ('Hy CIte') what do inscription of others sellers. the new seller can make the inscriptions as well
    */

    public function seller()
    {
    	return $this->belongsTo('App\Seller');
    }

    /**
    * the point is what a telemarketer offer his services to seller. if a seller dont want to use a telemarketer, then this will be create a record on telemarketing
    */
    public function telemarketer($value='')
    {
    	return $this->belongsTo('App\Telemarketer');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
