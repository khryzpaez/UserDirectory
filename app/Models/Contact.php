<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Contact extends Eloquent

{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'job_title', 'email', 'first_name', 'last_name', 'document', 'phone_number', 'country', 'state', 'city'
    ];

}