<?php

namespace App\Http\Controllers;
use \App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getRecords()
    {
        return view('admin.records');
    }

    public function getCategories()
    {
        $categories = Category::All();

        return view('admin.categories', [
            'categories' => $categories
        ]);
    }

    public function getFeedbacks()
    {
        return view('admin.feedbacks');
    }

    public function editCategoryShow($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.edit-category', [
            'category' => $category
        ]);
    }

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

    public function deleteCategory($id)
    {
        $category = Category::where('id', $id);
        $category->delete();

        return $this->getCategories();
    }
}
