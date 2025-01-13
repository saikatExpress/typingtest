<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'total_word',
        'passage',
        'language_type',
        'status',
    ];
}
