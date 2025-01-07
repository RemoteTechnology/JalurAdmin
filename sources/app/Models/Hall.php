<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'addres',
        'description',
        'start_work_time',
        'end_work_time'
    ];

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];
}
