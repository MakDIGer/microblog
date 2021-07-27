<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showForm()
    {
        $categories = Category::all();

        return view('pages.feedback', [
            'categories' => $categories
        ]);
    }

    public function sendForm(Request $request)
    {
        $categories = Category::all();
        $validated = $request->validate([
            'name_feedback' => 'required|min:3|max:255',
            'email_feedback' => 'email:rfc,dns|required',
            'text_feedback' => 'required|min:4|max:500'
        ]);

        $feedback = new FeedBack();

        $feedback->name = $validated['name_feedback'];
        $feedback->email = $validated['email_feedback'];
        $feedback->text = $validated['text_feedback'];
        $feedback->isAnswered = false;

        $feedback->save();

        return view('pages.feedback', [
            'categories' => $categories,
            'success' => true
        ]);

    }
}
