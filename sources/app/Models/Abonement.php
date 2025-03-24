<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonement extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'price',
        'time_of_action',
        'avaible_workout_count'
    ];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];
}
