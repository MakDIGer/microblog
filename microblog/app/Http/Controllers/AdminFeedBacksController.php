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

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function answerFeedbackShow($id)
    {
        $feedback = FeedBack::where('id', $id)->firstOrFail();

        return view('admin.answer-feedback', [
            'feedback' => $feedback
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function moreFeedback($id)
    {
        $feedback = FeedBack::where('id', $id)->firstOrFail();

        return view('admin.more-feedback', [
            'feedback' => $feedback
        ]);
    }

    public function answerFeedback(Request $request, $id)
    {
        $validated = $request->validate([
            'text_edit-feedback' => 'required|min:3'
        ]);

        $feedback = FeedBack::where('id', $id)->firstOrFail();
        $feedback->answer = $validated['text_edit-feedback'];
        $feedback->isAnswered = true;
        if ($feedback->save())
        {
            return view('admin.more-feedback', [
                'feedback' => $feedback
            ]);
        } else {
            return back()->withErrors([
                'error' => 'Ошибка сохранения!'
            ]);
        }
    }
}
