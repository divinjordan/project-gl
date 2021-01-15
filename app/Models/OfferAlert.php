<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferAlert extends Model
{
    use HasFactory;

    protected $primaryKey = 'offer_alert_id';

    protected $guarded = [];
}
