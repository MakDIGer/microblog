@extends('layouts.admin-layout')

@section('content')
    <h2>Новая запись</h2>
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
        <form method="POST" action="{{ route('new-record-add') }}">
            @csrf
            <div class="mb-3">
                <label for="title_new-record" class="form-label">Заголовок</label>
                <input type="text" class="form-control" id="title_new-record" name="title_new-record" value="">
            </div>
            <div class="mb-3">
                <label for="category_id-new-record" class="form-label">Категория</label>
                <select class="form-select" aria-label="Default select example" id="category_id-new-record"
                        name="category_id-new-record">
                    <option selected>Выберите категорию</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="prevText_new-record" class="form-label">Превью</label>
                <textarea class="form-control" id="prevText_new-record" name="prevText_new-record" cols="80" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="text_new-record" class="form-label">Текст</label>
                <textarea class="form-control" id="text_new-record" name="text_new-record" cols="80" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="tags_new-record" class="form-label">Тэги</label>
                <input type="text" class="form-control" id="tags_new-record" name="tags_new-record" value="">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
