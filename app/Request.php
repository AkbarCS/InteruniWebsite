<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size'
    ];

    /**
     * Get the user record associated with the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
