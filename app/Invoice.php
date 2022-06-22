<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    public $table = 'invoice';
    protected $guarded = ['id'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
}
