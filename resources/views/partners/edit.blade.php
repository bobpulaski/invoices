@extends('templates.main')

@php
    $title = 'Форма редактирования контрагента';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h1>Форма редактирования контрагента</h1>
    <form action="{{ route('partners.update' , [$currentRecord[0]->id]) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="id" value="{{ $currentRecord[0]->id }}">
        <input type="text" name="name" value="{{ $currentRecord[0]->name }}">
        <input type="text" name="inn" value="{{ $currentRecord[0]->inn }}">
        <button type="submit">Сохранить</button>
    </form>
@endsection
