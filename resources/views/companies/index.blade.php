@extends('templates.main')

@php
    $title = 'Мои организации';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @if(session()->has('success'))
        <div class="bg-cyan-700 p-3 mb-3 text-gray-100 rounded">
            <span class="font-medium">Организация <strong>{{ session()->get('hisName') }}</strong></span> {{ session()->get('success') }}
        </div>
    @endif

    <div class="flex flex-row mt-3 mb-3 items-end">
        <div class="relative w-full max-w-full flex-grow flex-1">
            <x-h1>{{ $title }}</x-h1>
            <p class="text-gray-600 text-xs py-2">Список ваших организаций. Организаций может быть несколько.</p>
        </div>

        <a class="ml-2 text-sm" href="{{ route('companies.create') }}" title="Добавить компанию">
            <div
                    class="flex flex-row border border-gray-400 transition duration-150 ease-in hover:border-gray-600 font-light py-2 px-4 rounded text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
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
        @if (!empty($companies) && $companies->count())
            @foreach ($companies as $el)
                <tr>
                    <td class="text-right border-b px-1 border-r border-l text-xs whitespace-nowrap p-1">{{ $el->user_id }}</td>
                    <td class="text-right border-b px-1 border-r border-l text-xs whitespace-nowrap p-1">{{ $el->name }}</td>
                    <td class="text-right border-b px-1 border-r border-l text-xs whitespace-nowrap p-1">{{ $el->inn }}</td>
                    <td class="text-right border-b px-1 border-r border-l text-xs whitespace-nowrap p-1">{{ $el->kpp }}</td>
                    <td class="text-right border-b px-1 border-r border-l text-xs whitespace-nowrap p-1">{{ $el->address }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="p-3" colspan="10">Вы пока не добавили ни одной своей организации.</td>
            </tr>
        @endif
        </tbody>
    </table>


@endsection

