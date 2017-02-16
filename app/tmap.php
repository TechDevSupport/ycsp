<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tmap extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'token', 'created_at',
    ];
    protected $table = 'tmap';
}
