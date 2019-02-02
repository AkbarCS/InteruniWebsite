<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'universities';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'domain'
    ];

    /**
     * Get the users for the university.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all of the flights for the university.
     */
    public function flights()
    {
        return $this->hasManyThrough(Flight::class, User::class);
    }

    /**
     * Get all of the claims for the university.
     */
    public function claims()
    {
        return $this->hasManyThrough(Claim::class, User::class);
    }

    public function scopeApproved($query)
    {
        return $query->claims()->whereStatus('approved');
    }

    public function getProgressionPointsAttribute()
    {
        return $this->claims()->whereStatus('approved')->get()->sum->points;
    }

    public function getSoaringPointsAttribute()
    {
        return $this->flights()->whereType('soaring')->get()->sum->points;
    }

    public function getCrossCountryPointsAttribute()
    {
        return $this->flights()->whereType('crosscountry')->get()->sum->points;
    }

}
