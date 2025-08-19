<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}

