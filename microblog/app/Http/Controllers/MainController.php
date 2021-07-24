<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('pages.main', ['posts' => $posts]);
    }
}