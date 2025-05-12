<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'organization',
        'location',
        'start_date',
        'end_date',
        'description',
        'order'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'order' => 'integer'
    ];
} 