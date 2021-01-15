<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $primaryKey ='offer_id';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function propositions(){
        return $this->hasMany(Proposition::class);
    }

    public function offerFiles(){
        return $this->hasMany(OfferFile::class);
    }
}
