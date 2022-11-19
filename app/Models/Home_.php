<?php

namespace App\Models;


class Home
{
    private static $home = [
        [
            "judul" => "Post",
            "slug" => "post-1",
            "author" => "Cipto Ahirru",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, incidunt animi. Aspernatur dolores quaerat, possimus ex rerum odio? Cumque nemo corrupti dolore neque veniam? Explicabo nisi laboriosam laudantium natus quos."
        ],
        [
            "judul" => "Post 2",
            "slug" => "post-2",
            "author" => "Ciru",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, incidunt animi. Aspernatur dolores quaerat, possimus ex rerum odio? Cumque nemo corrupti dolore neque veniam? Explicabo nisi laboriosam laudantium natus quos."
        ],
    ];

    public static function all(){
        return collect(self::$home);
    }

    public static function find($slug){
        $posts = static::all();

        // $new_post = [];
        // foreach($posts as $post){
        //     if($post["slug"] === $slug){
        //         $new_post = $post;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
