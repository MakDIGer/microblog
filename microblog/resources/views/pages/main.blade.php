@extends('layouts.main-layout')

@section('title')
    Главная страница
@endsection

@section('content')
    @foreach ($posts as $post)
    <section class="post">
        <h3 class="title__post"><a href="/post/{{ $post->id }}/" class="link">{{ $post->title }}</a></h3>
        <h4 class="subtitle__post">{ Категория: <a href="/category/{{ $post->category['id'] }}/" class="link">{{ $post->category['title'] }}</a>, Дата публикации:
            <a href="/datePosts/{{ date('d-m-Y', strtotime($post->created_at)) }}/" class="link"><time datetime="{{ date('Y-m-d', strtotime($post->created_at)) }}">{{ date('d.m.Y', strtotime($post->created_at)) }}</time></a> }</h4>
        <p class="text__post">
            {{ $post->prevText }}
        </p>
        @php
            $arrTags = explode(', ', $post->tags);
        @endphp
        <p class="tags__post">{ Теги:
            @foreach($arrTags as $tag)
            &#123;&#123; <a href="/tags/{{ $tag }}/" class="link">{{ $tag }}</a>
                @if($tag !== $arrTags[array_key_last($arrTags)])
                    }},&nbsp;
                @else
                    }}&nbsp;
                @endif
            @endforeach
            }</p>
    </section>
    @endforeach
    <div class="container mt-4 p-0">
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
