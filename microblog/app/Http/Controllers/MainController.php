<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(4);

        return view('pages.main', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
