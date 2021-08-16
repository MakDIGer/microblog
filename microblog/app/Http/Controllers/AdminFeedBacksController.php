<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\FeedBack;

class AdminFeedBacksController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getFeedbacks(Request $request)
    {
        $feedbacks = FeedBack::orderByDesc('id')->paginate(10);

        return view('admin.feedbacks', [
            'feedbacks' => $feedbacks,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function answerFeedbackShow(Request $request, $id)
    {
        $feedback = FeedBack::where('id', $id)->firstOrFail();

        return view('admin.answer-feedback', [
            'feedback' => $feedback,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function moreFeedback(Request $request, $id)
    {
        $feedback = FeedBack::where('id', $id)->firstOrFail();

        return view('admin.more-feedback', [
            'feedback' => $feedback,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
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
                'feedback' => $feedback,
                'stats' => $request['stats']
            ]);
        } else {
            return back()->withErrors([
                'error' => 'Ошибка сохранения!'
            ]);
        }
    }

    public function deleteFeedback($id)
    {
        $feedback = FeedBack::where('id', $id)->firstOrFail();
        if ($feedback->delete())
        {
            $feedbacks = FeedBack::orderByDesc('id')->paginate(10);
            return view('admin.feedbacks', [
                'feedbacks' => $feedbacks,
                'stats' => $request['stats']
            ]);
        } else {
            return back()->withErrors([
                'error' => 'Не удалось удалить запись!'
            ]);
        };
    }
}
