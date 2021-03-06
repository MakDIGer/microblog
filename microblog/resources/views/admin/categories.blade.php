@extends('layouts.admin-layout')

@section('content')
    <h2>Категории</h2>
    <a href="{{ route('new-category') }}" class="btn btn-primary mb-4">Новая</a>
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
                <th scope="col" style="width:20px;"></th>
                <th scope="col" style="width:20px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td><a href="{{ route('edit-category', ['id' => $category->id]) }}"><span data-feather="edit"></span></a></td>
                <td><a href="{{ route('delete-category', ['id' => $category->id]) }}"><span data-feather="x-square"></span></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
