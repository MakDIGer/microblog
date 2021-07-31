@extends('layouts.admin-layout')

@section('content')
    <h2>Категории</h2>
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
                <td><a href="#"><span data-feather="edit"></span></a></td>
                <td><a href="#"><span data-feather="x-square"></span></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
