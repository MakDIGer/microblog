@extends('layouts.admin-layout')

@section('content')
    <h2>Обратная связь</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col" style="width:20px">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Отвечен</th>
                <th scope="col">Дата поступления</th>
                <th scope="col">Дата изменения</th>
                <th scope="col" style="width:20px;"></th>
                <th scope="col" style="width:20px;"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Буркин Василий Павлович</td>
                <td><a href="mailto:burkin@mail.ru">burkin@mail.ru</a></td>
                <td>Нет</td>
                <td>31.07.2021</td>
                <td>31.07.2021</td>
                <td><a href="#"><span data-feather="edit"></span></a></td>
                <td><a href="#"><span data-feather="x-square"></span></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Иванов Иван Иванович</td>
                <td><a href="mailto:ivanovich@mail.ru">ivanovich@mail.ru</a></td>
                <td>Да</td>
                <td>31.07.2021</td>
                <td>31.07.2021</td>
                <td><a href="#"><span data-feather="edit"></span></a></td>
                <td><a href="#"><span data-feather="x-square"></span></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Гарбулин Василий Игоревич</td>
                <td><a href="mailto:garbulin@mail.ru">garbulin@mail.ru</a></td>
                <td>Нет</td>
                <td>31.07.2021</td>
                <td>31.07.2021</td>
                <td><a href="#"><span data-feather="edit"></span></a></td>
                <td><a href="#"><span data-feather="x-square"></span></a></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
