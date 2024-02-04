<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];

    // relasi one to many ke Post
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
