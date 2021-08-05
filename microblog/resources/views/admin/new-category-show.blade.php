@extends('layouts.admin-layout')

@section('content')
    <h2>Новая категория</h2>
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
        <form method="POST" action="{{ route('new-category-add') }}">
            @csrf
            <div class="mb-3">
                <label for="title_new-category" class="form-label">Категория</label>
                <input type="text" class="form-control" id="title_new-category" name="title_new-category" value="">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
