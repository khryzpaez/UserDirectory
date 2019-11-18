<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Country extends Eloquent

{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'code'
    ];

}