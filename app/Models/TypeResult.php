<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'std_id',
        'gross_wpm',
        'net_wpm',
        'accuracy',
        'double_words',
        'skipped_words',
        'wrong_words',
        'typing_category',
        'duration',
    ];
}
