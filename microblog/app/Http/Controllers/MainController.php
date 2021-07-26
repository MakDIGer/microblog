<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class MainController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(4);

        return view('pages.main', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function aboutPage()
    {
        $categories = Category::all();
        return view('pages.about', ['categories' => $categories]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCategoryById($id)
    {
        $categories = Category::All();
        $posts = Post::where('category_id', $id)->paginate(4);
        $currentCategory = Category::where('id', $id)->first();

        return view('pages.main', [
            'posts' => $posts,
            'categories' => $categories,
            'currentCategory' => $currentCategory
        ]);
    }

    public function getTag($tag)
    {
        $categories = Category::All();
        $posts = Post::where('tags', 'like', '%' . $tag . '%')->paginate(4);

        return view('pages.main', [
            'posts' => $posts,
            'categories' => $categories,
            'tag' => $tag
        ]);
    }
}
