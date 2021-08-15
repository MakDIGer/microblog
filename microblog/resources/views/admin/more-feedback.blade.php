@extends('layouts.admin-layout')

@section('content')
    <h2>Фидбэк {{ $feedback->id }}</h2>
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
    <p>{{ $feedback->answer }}</p>
@endsection
