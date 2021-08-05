<?php

namespace App\Http\Controllers;
use \App\Models\Category;
use \App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getRecords()
    {
        $posts = Post::orderByDesc('id')->paginate(10);

        return view('admin.records', [
            'posts' => $posts
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCategories()
    {
        $categories = Category::orderByDesc('id')->paginate(10);

        return view('admin.categories', [
            'categories' => $categories
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFeedbacks()
    {
        return view('admin.feedbacks');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editCategoryShow($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.edit-category', [
            'category' => $category
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'title_edit-category' => 'required|min:4|max:254'
        ]);

        $category = Category::where('id', $id)->first();
        $category->title = $validated['title_edit-category'];
        $category->save();

        if ($category->title === $validated['title_edit-category'])
        {
            return $this->getCategories();
        }

        return back()->withErrors([
            'error' => 'Ошибка обновления записи в БД!'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function newCategoryShow()
    {
        return view('admin.new-category-show');
    }

    public function newCategory(Request $request)
    {
        $validated = $request->validate([
            'title_new-category' => 'required|min:3|max:254'
        ]);

        $category = new Category();
        $category->title = $validated['title_new-category'];
        $category->save();

        if ($category->title === $validated['title_new-category'])
        {
            return $this->getCategories();
        }

        return back()->withErrors([
            'error' => 'Ошибка добавления новой категории в БД!'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        $category = Category::where('id', $id);
        $posts = Post::where('category_id', $id)->get();
        if (count($posts) > 0)
        {
            return back()->withErrors([
                'error' => 'Ошибка! Категория не пустая!'
            ]);
        };
        $category->delete();

        return $this->getCategories();
    }

    public function newRecordShow()
    {
        $categories = Category::All();

        return view('admin.new-record', [
            'categories' => $categories
        ]);
    }

    public function newRecord(Request $request)
    {
        $validated = $request->validate([
            'title_new-record' => 'required|min:3|max:250',
            'category_id-new-record' => 'required|numeric',
            'prevText_new-record' => 'required|min:3|max:500',
            'text_new-record' => 'required|min:3',
            'tags_new-record' => 'min:3|max:250'
        ]);

        $post = new Post();
        $post->title = $validated['title_new-record'];
        $post->category_id = $validated['category_id-new-record'];
        $post->prevText = $validated['prevText_new-record'];
        $post->text = $validated['text_new-record'];
        $post->tags = $validated['tags_new-record'];
        $post->save();

        if ($post->title === $validated['title_new-record'])
        {
            return $this->getRecords();
        }

        return back()->withErrors([
            'error' => 'Ошибка добавления записи в БД!'
        ]);
    }
}
