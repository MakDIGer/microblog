@extends('layouts.admin-layout')

@section('content')
            <h2>Записи</h2>
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
                    <tr>
                        <td>1</td>
                        <td>Новость запись 0</td>
                        <td>Категория 4</td>
                        <td>24.07.2021</td>
                        <td>24.07.2021</td>
                        <td><a href="#"><span data-feather="edit"></span></a></td>
                        <td><a href="#"><span data-feather="x-square"></span></a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Новость запись 1</td>
                        <td>Категория 3</td>
                        <td>24.07.2021</td>
                        <td>24.07.2021</td>
                        <td><a href="#"><span data-feather="edit"></span></a></td>
                        <td><a href="#"><span data-feather="x-square"></span></a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Новость запись 2</td>
                        <td>Категория 2</td>
                        <td>24.07.2021</td>
                        <td>24.07.2021</td>
                        <td><a href="#"><span data-feather="edit"></span></a></td>
                        <td><a href="#"><span data-feather="x-square"></span></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
@endsection
