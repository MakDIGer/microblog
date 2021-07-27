@extends('layouts.main-layout')

@section('title')
    Обратная связь
@endsection

@section('content')
    <section id="feedback" class="post">
        <h3 class="title__post"><a href="#" class="link">{ // Обратная связь // }</a></h3>
        <p class="text__post">
            Если у вас есть какие-либо вопросы или предложения по поводу данного блога, вы
            можете оставить сообщение автору данного блога благодаря форме ниже.
        </p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/feedback" method="POST" class="mt-4">
            @csrf
            <input type="text" class="form-control" name="name_feedback" placeholder="Ваше имя: " required><br>
            <input type="email" class="form-control" name="email_feedback" placeholder="Ваш email: " required><br>
            <textarea name="text_feedback" class="form-control" id="text" cols="30" rows="10" placeholder="Ваш фидбэк: " required></textarea><br>
            <input type="submit" class="btn btn-danger" value="Отправить">
        </form>
    </section>
@endsection
