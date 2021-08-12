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
            @foreach($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->name }}</td>
                <td><a href="mailto:{{ $feedback->email }}">{{ $feedback->email }}</a></td>
                <td>{{ $feedback->isAnswered ? 'Да' : 'Нет' }}</td>
                <td>{{ $feedback->created_at }}</td>
                <td>{{ $feedback->updated_at }}</td>
                <td>{!! $feedback->isAnswered ? '<a href="' . route('admin-more-feedback', $feedback->id) . '"><span data-feather="arrow-right-circle"></span></a>' : '' !!}{!! !$feedback->isAnswered ? '<a href="' . route('admin-answer-feedback', $feedback->id) . '"><span data-feather="edit"></span></a>' : '' !!}</td>
                <td><a href="{{ route('admin-delete-feedback', $feedback->id) }}"><span data-feather="x-square"></span></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $feedbacks->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
