@extends('layouts.admin-layout')

@section('content')
    <h2>Ответ на фидбэк</h2>
    <p>{{ $feedback->name }} || {{ $feedback->email }}</p>
    <p>{{ $feedback->text }}</p>
    <p>{{ $feedback->created_at }} || {{ $feedback->updated_at }}</p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin-answer-feedback', ['id' => $feedback->id]) }}">
        @csrf
        <div class="mb-3">
            <label for="text_edit-feedback" class="form-label">Ответ</label>
            <textarea name="text_edit-feedback" id="text_edit-feedback" cols="30" rows="10" class="form-control" placeholder="Ваш ответ ..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ответить</button>
    </form>
@endsection
