<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zipdata extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zip_code',
        'state_abbreviation',
        'latitude',
        'longitude',
        'city',
        'state',
    ];

    protected $table = 'zipdata';
}
