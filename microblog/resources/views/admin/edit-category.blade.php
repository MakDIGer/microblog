@extends('layouts.admin-layout')

@section('content')
    <h2>Редактирование категории</h2>
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
        <form method="POST" action="{{ route('edit-category', ['id' => $category->id]) }}">
            @csrf
            <div class="mb-3">
                <label for="title_edit-category" class="form-label">Категория</label>
                <input type="text" class="form-control" id="title_edit-category" name="title_edit-category" value="{{ $category->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Отредактировать</button>
        </form>
    </div>
@endsection
