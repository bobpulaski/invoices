@extends('templates.main')

@php
    $title = 'Редактирование контрагента';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')
    <form action="{{ route('partners.update' , [$currentRecord[0]->id]) }}" method="post">
        @csrf
        @method('put')
        <x-h1>@yield('title')</x-h1>
        <p class="text-gray-600 text-xs py-2">Изменение информации
            <span class="font-bold">
                {{ $currentRecord[0]->name }}
            </span>
        </p>
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <x-h3>Реквизиты</x-h3>
            <div class="grid grid-cols-6 gap-5 border p-6">

                <div class="flex flex-col text-sm col-span-2">
                    <x-input-label for="fullname" req="false">Полное наименование</x-input-label>
                    <x-edit-input name="fullname" id="fullname" value="{{ $currentRecord[0]->fullname }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="fullname" req="false">Краткое наименование</x-input-label>
                    <x-edit-input name="name" id="name" value="{{ $currentRecord[0]->name }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="inn" req="false">ИНН</x-input-label>
                    <x-edit-input name="inn" id="inn" value="{{ $currentRecord[0]->inn }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="kpp" req="false">КПП</x-input-label>
                    <x-edit-input name="kpp" id="kpp" value="{{ $currentRecord[0]->kpp }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="ogrn" req="false">ОГРН</x-input-label>
                    <x-edit-input name="ogrn" id="ogrn" value="{{ $currentRecord[0]->ogrn }}"></x-edit-input>
                </div>

            </div>
        </div>

        <div class="bg-gray-200 shadow-md rounded mb-6">
            <x-h3>Контактная информация</x-h3>

            <div class="grid grid-cols-7 gap-5 border p-6">

                <div class="flex flex-col col-span-2 text-sm">
                    <x-input-label for="address" req="false">Адрес</x-input-label>
                    <x-edit-input name="address" id="address" value="{{ $currentRecord[0]->address }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="email" req="false">Email</x-input-label>
                    <x-edit-input name="email" id="email" value="{{ $currentRecord[0]->email }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="phone" req="false">Телефон</x-input-label>
                    <x-edit-input name="phone" id="phone" value="{{ $currentRecord[0]->phone }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="site" req="false">Сайт</x-input-label>
                    <x-edit-input name="site" id="site" value="{{ $currentRecord[0]->site }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="head_position" req="false">Должность руководителя</x-input-label>
                    <x-edit-input name="head_position" id="head_position" value="{{ $currentRecord[0]->head_position }}"></x-edit-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="head_name" req="false">ФИО руководителя</x-input-label>
                    <x-edit-input name="head_name" id="head_name" value="{{ $currentRecord[0]->head_name }}"></x-edit-input>
                </div>

            </div>
        </div>

        {{--Банковские реквизиты--}}
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <x-h3>Банковские реквизиты</x-h3>

            <div class="grid grid-cols-7 gap-5 border p-6">

                <div class="flex flex-col col-span-2 text-sm">
                    <x-input-label for="bankname" req="false">Наименование банка</x-input-label>
                    <x-edit-input name="bankname" id="bankname" value="{{ $currentRecord[0]->bankname }}"></x-edit-input>
                </div>

            </div>
        </div>



        <button type="submit">Сохранить</button>
    </form>
@endsection
