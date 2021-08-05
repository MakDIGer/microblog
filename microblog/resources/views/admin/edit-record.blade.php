@extends('layouts.admin-layout')

@section('content')
    <h2>Редактирование записи</h2>
    <div class="table-responsive">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('edit-record', ['id' => $id]) }}">
            @csrf
            <div class="mb-3">
                <label for="title_edit-record" class="form-label">Заголовок</label>
                <input type="text" class="form-control" id="title_edit-record" name="title_edit-record" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="category_id-edit-record" class="form-label">Категория</label>
                <select class="form-select" aria-label="Default select example" id="category_id-edit-record"
                        name="category_id-edit-record">
                    <option selected value="{{ $post->category_id }}">{{ $post->category['title'] }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="prevText_edit-record" class="form-label">Превью</label>
                <textarea class="form-control" id="prevText_edit-record" name="prevText_edit-record" cols="80" rows="2"
                >{{!! $post->prevText !!}}</textarea>
            </div>
            <div class="mb-3">
                <label for="text_edit-record" class="form-label">Текст</label>
                <textarea class="form-control" id="text_edit-record" name="text_edit-record" cols="80" rows="4"
                >{{!! $post->text !!}}</textarea>
            </div>
            <div class="mb-3">
                <label for="tags_edit-record" class="form-label">Тэги</label>
                <input type="text" class="form-control" id="tags_edit-record" name="tags_edit-record" value="{{ $post->tags }}">
            </div>
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
    </div>
@endsection
