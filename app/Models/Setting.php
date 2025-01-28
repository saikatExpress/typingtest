<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_logo',
        'favicon',
        'fb_link',
        'instagram_link',
        'youtube_link',
        'visibility',
        'status',
    ];
}
