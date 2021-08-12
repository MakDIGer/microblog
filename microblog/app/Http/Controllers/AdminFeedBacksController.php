<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\FeedBack;

class AdminFeedBacksController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFeedbacks()
    {
        $feedbacks = FeedBack::orderByDesc('id')->paginate(10);

        return view('admin.feedbacks', [
            'feedbacks' => $feedbacks
        ]);
    }

    public function answerFeedbackShow($id)
    {
        $feedback = FeedBack::where('id', $id)->firstOrFail();

        return view('admin.answer-feedback', [
            'feedback' => $feedback
        ]);
    }
}
