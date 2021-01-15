<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;

    protected $primaryKey = 'proposition_id';

    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
