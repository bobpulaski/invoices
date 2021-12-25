@extends('templates.main')

@php
    $title = 'Мои компании';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @if(session()->has('success'))
        <div class="bg-cyan-700 p-3 mb-3 text-gray-100 rounded">
            <span class="font-medium">Компания {{ session()->get('hisName') }}</span> {{ session()->get('success') }}
        </div>
    @endif

    <div class="flex flex-row mt-3 mb-3">
        <div class="relative w-full max-w-full flex-grow flex-1">
            <x-h1>{{ $title }}</x-h1>
        </div>

        <a class="ml-2 text-sm" href="{{ route('companies.create') }}" title="Добавить компанию">
            <div class="flex flex-row border border-gray-400 transition duration-150 ease-in hover:border-gray-600 font-light py-2 px-4 rounded text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
        </a>
    </div>

    <table class="items-center bg-transparent w-full border-collapse shadow-lg">
        <thead class="bg-gray-200 rounded">
        <tr>
            <x-th>user_id</x-th>
            <x-th>name</x-th>
            <x-th>inn</x-th>
            <x-th>kpp</x-th>
            <x-th>address</x-th>
            <x-th>head_position</x-th>
            <x-th>head_name</x-th>
            <x-th>phone</x-th>
            <x-th>email</x-th>
            <x-th>site</x-th>
            <x-th>Действие</x-th>
        </tr>
        </thead>
        <tbody>
        @if (!empty($partners) && $partners->count())
            @foreach ($partners as $el)
                <tr>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="p-3" colspan="10">Вы пока не добавили ни одной компании.</td>
            </tr>
        @endif
        </tbody>
    </table>


@endsection

