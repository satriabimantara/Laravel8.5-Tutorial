<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
});

Route::get('/blog', function () {
    $blog_posts = [
        [
            'title' => "Judul Post Pertama",
            'slug' => 'judul-post-pertama',
            'author' => "Satria Bimantara",
            'text' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum omnis, blanditiis aliquam tempora accusantium eum placeat eos incidunt assumenda sint! Consectetur perferendis sequi doloribus eveniet commodi impedit libero dolor laudantium maxime ab quas molestiae veritatis inventore fugit quo voluptatem animi quis mollitia, eligendi ex dicta magnam dolore? Eaque quisquam ad doloremque est dicta. Facere distinctio eos, voluptas libero perspiciatis qui iusto ab est reprehenderit eum, architecto itaque. Explicabo nesciunt ipsa eum vero, ipsum nisi enim veniam odio dolorem autem omnis voluptas illo distinctio culpa doloribus molestiae! Est, sapiente? Iste totam, dolore id similique perferendis at quibusdam consequatur vitae in veniam?"
        ],
        [
            'title' => "Judul Post Kedua",
            'slug' => 'judul-post-kedua',
            'author' => "Satria Budiarto",
            'text' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum omnis, blanditiis aliquam tempora accusantium eum placeat eos incidunt assumenda sint! Consectetur perferendis sequi doloribus eveniet commodi impedit libero dolor laudantium maxime ab quas molestiae veritatis inventore fugit quo voluptatem animi quis mollitia, eligendi ex dicta magnam dolore? esciunt ipsa eum vero, ipsum nisi enim veniam odio dolorem autem omnis voluptas illo distinctio culpa doloribus molestiae! Est, sapiente? Iste totam, dolore id similique perferendis at quibusdam consequatur vitae in veniam?"
        ],
        [
            'title' => "Judul Post Ketiga",
            'slug' => 'judul-post-ketiga',
            'author' => "Rahmawati Suciati",
            'text' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem doloremque qui voluptatum iusto necessitatibus earum, placeat nisi, iure tempore soluta aspernatur voluptates deserunt laborum exercitationem in nobis tenetur adipisci non totam neque quidem magnam iste architecto! Tempora quibusdam voluptates veritatis consequatur maxime provident quis soluta blanditiis assumenda unde cum facilis, eos cumque quas autem fugit earum, ad deleniti? Repellat quisquam odio aperiam id voluptas. Provident et quae corrupti nostrum iusto eaque laborum, aperiam pariatur placeat voluptatibus suscipit commodi amet nihil! Dolorum delectus quia odit aut eum dicta temporibus voluptatum, dolore nam odio et officiis. Aspernatur veniam velit, illum deleniti quis recusandae autem reiciendis impedit quisquam architecto veritatis doloremque nesciunt eius saepe numquam a possimus quidem eligendi. Totam repellat officiis excepturi? Expedita ducimus exercitationem distinctio harum labore consectetur quam molestias sequi qui soluta accusantium, quidem rerum ullam vel tempore animi? Officia repudiandae enim dicta vel. Similique vel enim exercitationem dicta consequatur iusto fugiat laborum, doloremque id commodi et, earum, rerum sit. Laboriosam facilis quod, enim doloremque sed nobis laudantium aspernatur perferendis, ea voluptatem perspiciatis reiciendis soluta. Culpa aperiam mollitia reprehenderit accusamus quasi cupiditate earum hic ad quod alias tempora expedita sequi labore facilis nostrum, distinctio, odio nam illum voluptatibus nulla excepturi."
        ]
    ];
    return view('blog', [
        'title' => 'Blog',
        'posts' => $blog_posts
    ]);
});

# routing untuk single post
Route::get('/blog/{slug}', function ($slug) {
    return view('post', [
        'title' => 'Single Post'
    ]);
});
