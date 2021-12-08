@extends('templates.main')

@php
    $title = 'Подтверждение удаления контрагента';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    <div class="flex h-full">
        <div class="flex flex-col items-start m-auto h-auto bg-white p-5 shadow-2xl">
            <div class="text-1xl text-gray-800 font-bold">Вы действительно хотите удалить <br> «{{ $name }}»?</div>
            <h3 class="text-sm text-gray-400 pt-3">Это действие невозможно отменить</h3>
            <div class="pt-3">
                <form class="" method="POST" action="{{ route('partners.destroy', $id) }}">
                    @method('delete')
                    @csrf

                    <div class="flex">
                        <a href="{{ route('partners.index') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded mt-3">Нет</a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded mt-3 ml-3">Да, удалить  {{ $name }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
