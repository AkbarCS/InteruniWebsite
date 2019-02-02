<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'type'
    ];

    /**
     * Get the user record associated with the flight.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

