@extends('layouts.admin-layout')

@section('content')
            <h2>Записи</h2>
            <a href="{{ route('new-record') }}" class="btn btn-primary mb-4">Новая</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col" style="width:20px">ID</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Создано</th>
                        <th scope="col">Изменено</th>
                        <th scope="col" style="width:20px;"></th>
                        <th scope="col" style="width:20px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category['title'] }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td><a href="{{ route('edit-record', ['id' => $post->id]) }}"><span data-feather="edit"></span></a></td>
                        <td><a href="{{ route('delete-record', ['id' => $post->id]) }}"><span data-feather="x-square"></span></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
@endsection
