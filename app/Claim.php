<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'instructor', 'claims', 'points', 'remarks'
    ];

    /**
     * Get the user record associated with the flight.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
