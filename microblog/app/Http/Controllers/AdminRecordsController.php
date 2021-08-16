<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminRecordsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getRecords(Request $request)
    {
        $posts = Post::orderByDesc('id')->paginate(10);

        return view('admin.records', [
            'posts' => $posts,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getRecordsSearch(Request $request)
    {
        $validated = $request->validate([
            'search' => 'required|min:1|max:250'
        ]);

        $posts = Post::where('title', 'like', '%' . $validated['search'] . '%')->orderByDesc('id')->paginate(10);
        $posts->appends(['search' => $validated['search']]);

        return view('admin.records', [
            'posts' => $posts,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function newRecordShow(Request $request)
    {
        $categories = Category::All();

        return view('admin.new-record', [
            'categories' => $categories,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editRecordShow(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::All();

        return view('admin.edit-record', [
            'id' => $id,
            'post' => $post,
            'categories' => $categories,
            'stats' => $request['stats']
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editRecord(Request $request, $id)
    {
        $validated = $request->validate([
            'title_edit-record' => 'required|min:3|max:250',
            'category_id-edit-record' => 'required|numeric',
            'prevText_edit-record' => 'required|min:3|max:500',
            'text_edit-record' => 'required|min:3',
            'tags_edit-record' => 'min:3|max:250'
        ]);

        $post = Post::where('id', $id)->first();

        $post->title = $validated['title_edit-record'];
        $post->category_id = $validated['category_id-edit-record'];
        $post->prevText = $validated['prevText_edit-record'];
        $post->text = $validated['text_edit-record'];
        $post->tags = $validated['tags_edit-record'];
        $post->save();

        if ($post->wasChanged())
        {
            return $this->getRecords();
        }

        return back()->withErrors([
            'error' => 'Данные не изменены в БД!'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function deleteRecord($id)
    {
        $post = Post::where('id', $id);
        $post->delete();

        return $this->getRecords();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
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
