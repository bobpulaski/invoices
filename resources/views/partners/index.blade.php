@extends('templates.main')

@php
    $title = 'Контрагенты';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h1>Контрагенты</h1>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>#ID</th>
            <th>#name</th>
            <th>#inn</th>
            <th>#User_Id</th>
            <th>#action</th>
        </tr>
        </thead>
        <tbody>
        @if (!empty($Partner) && $Partner->count())
            @foreach ($Partner as $el)
                <tr>
                    <td>{{ $el->id }}</td>
                    <td>{{ $el->name }}</td>
                    <td>{{ $el->inn }}</td>
                    <td>{{ $el->user_id }}</td>
                    <td><a href="confirmation/{{ $el->id }}">Удалить</a></td>
                    <td><a href="{{ route('partners.edit' , [$el->id]) }}">Изменить</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>

            </tr>
        @endif
        </tbody>
    </table>

    {{ $Partner->links() }} {{--Pagination--}}

@endsection
