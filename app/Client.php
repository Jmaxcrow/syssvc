<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
		use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    protected $primaryKey = 'idClient';
    
    protected $fillable = ['phone_number','house_phone_number','name','lastname','address','number_apt','city','state','zip_code','birthday','sex','isClient',
                            'hasWorks','count_number','date_origin','time_origin','commentaries','origin','sub_origin','created_by','isDeleted'];

    
}
