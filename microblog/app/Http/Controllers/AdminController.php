<?php

namespace App\Http\Controllers;
use \App\Models\Category;

use Illuminate\Http\Request;

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
}
