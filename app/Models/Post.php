<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // field yang boleh diisi oleh user
    protected $fillable = [
        "title",
        'slug',
        "author",
        "excerpt",
        "body"
    ];

    // field yang tidak boleh diisi
    // protected $guarded = ['id'];
}
