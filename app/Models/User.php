<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent

{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'name', 'email', 'password', 'document', 'country_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [

        'password',

    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}