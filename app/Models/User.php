<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'phone',
        'gender',
        'address',
        'country',
        'preferences'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function offerAlerts(){
        return $this->hasMany(OfferAlert::class);
    }

    public function propositions(){
        return $this->hasMany(Proposition::class);
    }

    public function invitations(){
        return $this->hasMany(Proposition::class);
    }

    public function mentorings(){
        return $this->hasMany(Proposition::class,'mentor_id');
    }

    public function mentored(){
        return $this->hasOne(Mentoring::class,'mentored_id');
    }

    public function avatar(){
        return $this->hasOne(UserAvatar::class);
    }
}
