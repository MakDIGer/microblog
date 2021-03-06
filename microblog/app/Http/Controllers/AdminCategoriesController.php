<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getCategories(Request $request)
    {
        $categories = Category::orderByDesc('id')->paginate(10);

        return view('admin.categories', [
            'categories' => $categories,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function newCategoryShow(Request $request)
    {
        return view('admin.new-category-show', [
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function newCategory(Request $request)
    {
        $validated = $request->validate([
            'title_new-category' => 'required|min:3|max:254'
        ]);

        $category = new Category();
        $category->title = $validated['title_new-category'];

        if ($category->save())
        {
            return redirect(route('admin-categories'));
        }

        return back()->withErrors([
            'error' => 'Ошибка добавления новой категории в БД!'
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editCategoryShow(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.edit-category', [
            'category' => $category,
            'stats' => $request['stats']
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

        if ($category->wasChanged())
        {
            return redirect(route('admin-categories'));
        }

        return back()->withErrors([
            'error' => 'Ошибка обновления записи в БД!'
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

        return redirect(route('admin-categories'));
    }
}
