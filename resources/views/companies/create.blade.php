@extends('templates.main')

@php
    $title = 'Добавить компанию';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="post">
        @csrf
        @method('POST')

        <h1 class="font-semibold text-3xl text-gray-700 mb-4">@yield('title')</h1>

        <div class="bg-gray-200 shadow-md rounded mb-6">
            <x-h3>Реквизиты</x-h3>
            <div class="grid grid-cols-6 gap-5 border p-6">

                <div class="flex flex-col text-sm col-span-2">
                    <x-input-label for="fullname" req="true">Полное наименование ЮЛ или ИП</x-input-label>
                    <x-my-input name="fullname" id="fullname"
                                placeholder="Общество с ограниченной ответственностью «Ромашка»"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="name" req="true">Краткое наименование</x-input-label>
                    <x-my-input name="name" id="name" placeholder="ООО «Ромашка»"></x-my-input>
                </div>


                <div class="flex flex-col text-sm">
                    <x-input-label for="inn" req="true">ИНН</x-input-label>
                    <x-my-input name="inn" id="inn" placeholder="7734126105"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="kpp" req="false">КПП</x-input-label>
                    <x-my-input name="kpp" id="kpp" placeholder="773401001"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="ogrn" req="false">ОГРН</x-input-label>
                    <x-my-input name="ogrn" id="ogrn" placeholder="1027739609391"></x-my-input>
                </div>

            </div>
        </div>

        {{--Контактная информация--}}
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <x-h3>Контактная информация</x-h3>

            <div class="grid grid-cols-7 gap-5 border p-6">

                <div class="flex flex-col col-span-2 text-sm">
                    <x-input-label for="address" req="false">Адрес</x-input-label>
                    <x-my-input name="address" id="address"
                                placeholder="119049 г. Москва, ул. Донская, д. 8 стр. 1"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="email" req="email">Email</x-input-label>
                    <x-my-input name="email" id="email"
                                placeholder="name@sitename.ru"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="phone" req="phone">Телефон</x-input-label>
                    <x-my-input name="phone" id="phone"
                                placeholder="+7-909-12-32-12"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="site" req="site">Сайт</x-input-label>
                    <x-my-input name="site" id="site"
                                placeholder="sitename.ru"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="head_position" req="false">Должность руководителя</x-input-label>
                    <x-my-input name="head_position" id="head_position"
                                placeholder="Генеральный директор"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="head_name" req="false">ФИО руководителя</x-input-label>
                    <x-my-input name="head_name" id="head_name"
                                placeholder="Иванов А.И."></x-my-input>
                </div>


            </div>
        </div>

    </form>

@endsection
