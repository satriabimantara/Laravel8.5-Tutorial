<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // field yang boleh diisi oleh user
    protected $fillable = [
        "category_id",
        "title",
        'slug',
        "author",
        "excerpt",
        "body"
    ];
    // properti with untuk menangani N+1 problem, selain bisa ditaruh di controller
    protected $with = ['author', 'category'];

    // field yang tidak boleh diisi
    // protected $guarded = ['id'];

    // buat function untuk one-to-one relationship dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
