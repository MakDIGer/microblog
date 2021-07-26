<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function showForm()
    {
        $categories = Category::all();

        return view('pages.feedback', [
            'categories' => $categories
        ]);
    }
}
