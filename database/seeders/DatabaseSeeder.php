<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cipto Ahirru',
            'username' => 'Garuda Garang',
            'email' => 'cipto.ahirru0912@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Category::create([
            'name' => 'Komik',
            'slug' => 'komik',
        ]);

        Post::factory(25)->create();
        
        // $title = "Judul Kedua Slug";

        // Post::create([
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'judul' => $title,
        //     'slug' => Str::slug($title),
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil dolorum temporibus unde ratione consequatur ipsam molestias illum, velit eum itaque fugit odio quod tenetur at mollitia sunt ut accusantium fugiat nesciunt voluptatibus et nam eveniet! Amet, quis officiis atque recusandae aut nulla fugit sit neque nisi aliquam quo error, quod est similique delectus omnis numquam soluta eos et voluptas dolores voluptatum doloribus voluptatem. Debitis, ipsam aperiam nisi quisquam voluptate dicta nostrum ipsum laborum enim tenetur, ratione iste in voluptates. Neque nemo beatae, nesciunt dolorem molestiae eligendi ipsum nobis quae nihil odit expedita reiciendis quos sequi dignissimos? Officiis porro tempore quisquam facere quidem nesciunt repellat recusandae, cumque asperiores non eligendi reiciendis autem neque culpa ipsum minus. Dolores nobis sit est repellat ea maxime totam deleniti, assumenda odit optio. Repellendus quia, vitae neque cum fugit debitis accusamus doloribus, non saepe dolorum tempora nam? Neque nostrum provident distinctio atque dicta beatae. Magni pariatur dolores eius, perferendis quibusdam optio inventore eveniet labore porro, eaque soluta consequatur numquam minus, quod praesentium quia. Dolorum, debitis. Deleniti ab laborum ad? Et molestias deserunt temporibus perferendis blanditiis, cum possimus ab deleniti corporis quam, cupiditate voluptates fugiat perspiciatis rem aut accusantium quibusdam pariatur in repellat obcaecati odio eaque. Nam?'
        // ]);
    }
}
