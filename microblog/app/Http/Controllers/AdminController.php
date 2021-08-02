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
        $res = DB::table('categories')->where('id',$id)->update(['title' => $validated['title_edit-category']]);

        if ($res) {
            return $this->getCategories();
        }

        return back()->withErrors([
            'error' => 'Ошибка обновления записи в БД!'
        ]);
    }
}
