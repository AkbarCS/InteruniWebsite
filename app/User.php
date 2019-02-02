<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get a user's gravatar URL
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 64)
    {
        return "https://www.gravatar.com/avatar/" .
            md5( strtolower( trim( $this->email ) ) ) .
            "?d=mm" .
            "&s=" . $size;
    }
		
    /**
     * Get the university record associated with the user.
     */
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Get the requests for the user.
     */
    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    /**
     * Get the flights for the user.
     */
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    /**
     * Get the claims for the user.
     */
    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function progressionPoints()
    {
        return $this->claims()->where('status', 'approved')->get()->sum->points;
    }

    public function soaringPoints()
    {
        return $this->flights()->where('type', 'soaring')->get()->sum->points;
    }

    public function crossCountryPoints()
    {
        return $this->flights()->where('type', 'crosscountry')->get()->sum->points;
    }
}
