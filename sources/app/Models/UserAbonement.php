<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAbonement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'abonement_id',
        'remaining_workout_count',
        'price',
        'expired'
    ];
}
