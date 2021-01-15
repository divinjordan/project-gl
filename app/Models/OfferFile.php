<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferFile extends Model
{
    use HasFactory;

    protected $primaryKey = 'offer_file_id';

    protected $guarded = [];
}
