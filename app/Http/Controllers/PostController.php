<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {   
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('home',[
            'title' => "All Posts".$title,
            // "homed" => Post::all()

            
            "homed" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => "single post",
            "post" => $post,
        ]);
    }
}
