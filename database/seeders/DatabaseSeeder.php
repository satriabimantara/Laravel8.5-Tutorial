<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Bangkitkan data dummy untuk mengisi table baru setelah artisan migrate:fresh
        /**
         * Jalankan: php artisan migrate:fresh --seed
         * Cara bacanya: Reset table db lalu tambahkan data seeder secara otomatis
         */
        User::create([
            'name' => "Satria Bimantara",
            'email' => "satriabimantara@gmail.com",
            "password" => bcrypt('1234')
        ]);
        User::create([
            'name' => "Budiman Raharjo",
            'email' => "budiman@gmail.com",
            "password" => bcrypt('1234')
        ]);
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning'
        ]);
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Research',
            'slug' => 'research'
        ]);
        Post::create([
            'category_id' => 1,
            'user_id' => 1,
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam!",
            'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam! Quia quisquam, libero fugit commodi itaque illo deleniti accusamus voluptas, temporibus architecto veritatis. Alias explicabo dolorem laboriosam eligendi expedita excepturi voluptas assumenda veniam sit ab? Nihil doloribus enim consequatur qui tenetur tempora ea asperiores maiores nostrum, cupiditate, aperiam blanditiis debitis a dolores, ullam saepe eaque fugit facilis velit iste soluta explicabo. Asperiores animi nulla aliquid nihil provident, nobis velit commodi cum soluta odio ex suscipit consequuntur ut est fugit laudantium. Reprehenderit officiis perferendis libero deleniti labore dicta porro nihil est, nesciunt dolor magnam magni molestias ad inventore, cum voluptate a? In asperiores officiis, odit dolor ullam aliquam! </p>
            <p>Neque, eos? Officiis, excepturi iste quas sint dolorem ab laudantium. Mollitia at quae molestias provident incidunt numquam! Alias ullam soluta consequuntur dignissimos quis rem vel id eos aliquam recusandae eveniet optio sequi voluptatem velit ab ipsam aut dicta dolorem at vitae ducimus, omnis cumque ea assumenda. A voluptatum, praesentium itaque totam necessitatibus id asperiores unde laudantium quibusdam perspiciatis aliquid deserunt tempora cumque sit voluptatibus voluptas labore nihil veniam eos non. Inventore ducimus minus expedita enim ab accusamus a perspiciatis obcaecati, provident eligendi in perferendis possimus nemo optio rem, quam cumque laborum unde, nobis quaerat. Obcaecati facere cum nisi autem placeat eligendi cupiditate atque eius vero in, iure temporibus esse ut totam sequi accusantium consequuntur mollitia laborum, a, reprehenderit quisquam odit perferendis! Voluptate nemo quo ea amet maxime dolore excepturi beatae quam fuga officiis rem, quibusdam vitae laboriosam aperiam hic quisquam sequi veniam et ad totam voluptatibus doloribus saepe. </p>
            <p>Repellat error molestias non ex magnam libero ducimus obcaecati explicabo quidem. Facilis perferendis aut id ratione architecto, ullam culpa quidem tenetur voluptas molestias, quos accusamus fugiat quo quisquam suscipit nesciunt, eaque dolore. Architecto cum magni laudantium expedita similique corporis alias eligendi?</p>
            "
        ]);
        Post::create([
            'category_id' => 1,
            'user_id' => 1,
            'title' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'excerpt' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam!",
            'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam! Quia quisquam, libero fugit commodi itaque illo deleniti accusamus voluptas, temporibus architecto veritatis. Alias explicabo dolorem laboriosam eligendi expedita excepturi voluptas assumenda veniam sit ab? Nihil doloribus enim consequatur qui tenetur tempora ea asperiores maiores nostrum, cupiditate, aperiam blanditiis debitis a dolores, ullam saepe eaque fugit facilis velit iste soluta explicabo. Asperiores animi nulla aliquid nihil provident, nobis velit commodi cum soluta odio ex suscipit consequuntur ut est fugit laudantium. Reprehenderit officiis perferendis libero deleniti labore dicta porro nihil est, nesciunt dolor magnam magni molestias ad inventore, cum voluptate a? In asperiores officiis, odit dolor ullam aliquam! </p>
            <p>Neque, eos? Officiis, excepturi iste quas sint dolorem ab laudantium. Mollitia at quae molestias provident incidunt numquam! Alias ullam soluta consequuntur dignissimos quis rem vel id eos aliquam recusandae eveniet optio sequi voluptatem velit ab ipsam aut dicta dolorem at vitae ducimus, omnis cumque ea assumenda. A voluptatum, praesentium itaque totam necessitatibus id asperiores unde laudantium quibusdam perspiciatis aliquid deserunt tempora cumque sit voluptatibus voluptas labore nihil veniam eos non. Inventore ducimus minus expedita enim ab accusamus a perspiciatis obcaecati, provident eligendi in perferendis possimus nemo optio rem, quam cumque laborum unde, nobis quaerat. Obcaecati facere cum nisi autem placeat eligendi cupiditate atque eius vero in, iure temporibus esse ut totam sequi accusantium consequuntur mollitia laborum, a, reprehenderit quisquam odit perferendis! Voluptate nemo quo ea amet maxime dolore excepturi beatae quam fuga officiis rem, quibusdam vitae laboriosam aperiam hic quisquam sequi veniam et ad totam voluptatibus doloribus saepe. </p>
            <p>Repellat error molestias non ex magnam libero ducimus obcaecati explicabo quidem. Facilis perferendis aut id ratione architecto, ullam culpa quidem tenetur voluptas molestias, quos accusamus fugiat quo quisquam suscipit nesciunt, eaque dolore. Architecto cum magni laudantium expedita similique corporis alias eligendi?</p>
            "
        ]);
        Post::create([
            'category_id' => 2,
            'user_id' => 1,
            'title' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam!",
            'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam! Quia quisquam, libero fugit commodi itaque illo deleniti accusamus voluptas, temporibus architecto veritatis. Alias explicabo dolorem laboriosam eligendi expedita excepturi voluptas assumenda veniam sit ab? Nihil doloribus enim consequatur qui tenetur tempora ea asperiores maiores nostrum, cupiditate, aperiam blanditiis debitis a dolores, ullam saepe eaque fugit facilis velit iste soluta explicabo. Asperiores animi nulla aliquid nihil provident, nobis velit commodi cum soluta odio ex suscipit consequuntur ut est fugit laudantium. Reprehenderit officiis perferendis libero deleniti labore dicta porro nihil est, nesciunt dolor magnam magni molestias ad inventore, cum voluptate a? In asperiores officiis, odit dolor ullam aliquam! </p>
            <p>Neque, eos? Officiis, excepturi iste quas sint dolorem ab laudantium. Mollitia at quae molestias provident incidunt numquam! Alias ullam soluta consequuntur dignissimos quis rem vel id eos aliquam recusandae eveniet optio sequi voluptatem velit ab ipsam aut dicta dolorem at vitae ducimus, omnis cumque ea assumenda. A voluptatum, praesentium itaque totam necessitatibus id asperiores unde laudantium quibusdam perspiciatis aliquid deserunt tempora cumque sit voluptatibus voluptas labore nihil veniam eos non. Inventore ducimus minus expedita enim ab accusamus a perspiciatis obcaecati, provident eligendi in perferendis possimus nemo optio rem, quam cumque laborum unde, nobis quaerat. Obcaecati facere cum nisi autem placeat eligendi cupiditate atque eius vero in, iure temporibus esse ut totam sequi accusantium consequuntur mollitia laborum, a, reprehenderit quisquam odit perferendis! Voluptate nemo quo ea amet maxime dolore excepturi beatae quam fuga officiis rem, quibusdam vitae laboriosam aperiam hic quisquam sequi veniam et ad totam voluptatibus doloribus saepe. </p>
            <p>Repellat error molestias non ex magnam libero ducimus obcaecati explicabo quidem. Facilis perferendis aut id ratione architecto, ullam culpa quidem tenetur voluptas molestias, quos accusamus fugiat quo quisquam suscipit nesciunt, eaque dolore. Architecto cum magni laudantium expedita similique corporis alias eligendi?</p>
            "
        ]);
        Post::create([
            'category_id' => 3,
            'user_id' => 2,
            'title' => 'Judul Keempat',
            'slug' => 'judul-keempat',
            'excerpt' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam!",
            'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias minus blanditiis hic atque veniam! Quia quisquam, libero fugit commodi itaque illo deleniti accusamus voluptas, temporibus architecto veritatis. Alias explicabo dolorem laboriosam eligendi expedita excepturi voluptas assumenda veniam sit ab? Nihil doloribus enim consequatur qui tenetur tempora ea asperiores maiores nostrum, cupiditate, aperiam blanditiis debitis a dolores, ullam saepe eaque fugit facilis velit iste soluta explicabo. Asperiores animi nulla aliquid nihil provident, nobis velit commodi cum soluta odio ex suscipit consequuntur ut est fugit laudantium. Reprehenderit officiis perferendis libero deleniti labore dicta porro nihil est, nesciunt dolor magnam magni molestias ad inventore, cum voluptate a? In asperiores officiis, odit dolor ullam aliquam! </p>
            <p>Neque, eos? Officiis, excepturi iste quas sint dolorem ab laudantium. Mollitia at quae molestias provident incidunt numquam! Alias ullam soluta consequuntur dignissimos quis rem vel id eos aliquam recusandae eveniet optio sequi voluptatem velit ab ipsam aut dicta dolorem at vitae ducimus, omnis cumque ea assumenda. A voluptatum, praesentium itaque totam necessitatibus id asperiores unde laudantium quibusdam perspiciatis aliquid deserunt tempora cumque sit voluptatibus voluptas labore nihil veniam eos non. Inventore ducimus minus expedita enim ab accusamus a perspiciatis obcaecati, provident eligendi in perferendis possimus nemo optio rem, quam cumque laborum unde, nobis quaerat. Obcaecati facere cum nisi autem placeat eligendi cupiditate atque eius vero in, iure temporibus esse ut totam sequi accusantium consequuntur mollitia laborum, a, reprehenderit quisquam odit perferendis! Voluptate nemo quo ea amet maxime dolore excepturi beatae quam fuga officiis rem, quibusdam vitae laboriosam aperiam hic quisquam sequi veniam et ad totam voluptatibus doloribus saepe. </p>
            <p>Repellat error molestias non ex magnam libero ducimus obcaecati explicabo quidem. Facilis perferendis aut id ratione architecto, ullam culpa quidem tenetur voluptas molestias, quos accusamus fugiat quo quisquam suscipit nesciunt, eaque dolore. Architecto cum magni laudantium expedita similique corporis alias eligendi?</p>
            "
        ]);
    }
}
