<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contract',
        'user_id',
        'schedule_id',
        'total_training',
        'remaining_training',
    ];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];
}
