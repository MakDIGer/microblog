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
        $posts = Post::orderByDesc('id')->paginate(4);

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
        $posts = Post::where('category_id', $id)->orderByDesc('id')->paginate(4);
        $currentCategory = Category::where('id', $id)->first();

        return view('pages.main', [
            'posts' => $posts,
            'categories' => $categories,
            'currentCategory' => $currentCategory
        ]);
    }

    /**
     * @param $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getTag($tag)
    {
        $categories = Category::All();
        $posts = Post::where('tags', 'like', '%' . $tag . '%')->orderByDesc('id')->paginate(4);

        return view('pages.main', [
            'posts' => $posts,
            'categories' => $categories,
            'tag' => $tag
        ]);
    }

    /**
     * @param $date
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getDate($date)
    {
        $categories = Category::All();
        $posts = Post::whereDate('created_at', $date)->orderByDesc('id')->paginate(4);

        return view('pages.main', [
            'categories' => $categories,
            'posts' => $posts,
            'date' => $date
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPost($id)
    {
        $categories = Category::All();
        $post = Post::where('id', $id)->first();

        return view('pages.post', [
            'categories' => $categories,
            'post' => $post
        ]);
    }
}
