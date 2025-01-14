<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_workout_id',
        'name',
        'description',
        'images',
    ];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];
}
