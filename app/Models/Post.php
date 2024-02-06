<?php

namespace App\Models;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    // field yang boleh diisi oleh user
    // protected $fillable = [
    //     "category_id",
    //     "title",
    //     'slug',
    //     "author",
    //     "excerpt",
    //     "body"
    // ];
    protected $guarded = ['id'];
    // properti with untuk menangani N+1 problem, selain bisa ditaruh di controller
    protected $with = ['author', 'category'];

    // field yang tidak boleh diisi
    // protected $guarded = ['id'];

    // buat method filter query dengan scope
    public function scopeFilter($query, array $filters)
    {
        // cara filter query manual
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // cara filter query search dan category dengan when
        /**
         * operator x??y artinya jika x ada gunakan x, jika tidak ada gunakan y
         */
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
        /**
         * keyword 'use' artinya menggunakan/meneruskan outer variabel pada function saat ini
         */
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // karena berelasi one to one ke tabel category
            return $query->whereHas('category', function ($query) use ($category) {
                return $query->where('slug', $category);
            });
        });
        $query->when($filters['author'] ?? false, function ($query, $author) {
            // karena berelasi one to one ke tabel author
            return $query->whereHas('author', function ($query) use ($author) {
                return $query->where('username', $author);
            });
        });
    }

    // buat function untuk one-to-one relationship dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Setiap pencarian data pada model secara default menggunakan 'id' sebagai key
     * ada kalanya kita ingin melakukan pencarian menggunakan suatu kolom tertentu pada model, misalnya slug
     * kita bisa mengganti default dari 'id' ke 'slug'
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
