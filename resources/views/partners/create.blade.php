@extends('templates.main')

@section('title')Создание контрагента@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <form action="{{ route('partners.store') }}" method="post">
        @csrf
        @method('POST')

        <h1 class="font-semibold text-3xl text-gray-700 mb-4">@yield('title')</h1>

        {{--Реквизиты--}}
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <h2 class="bg-gray-500 text-white p-3 text-2xl">Реквизиты</h2>
            <div class="grid grid-cols-6 gap-5 border p-6">

                <div class="flex flex-col text-sm col-span-2">

                    <x-my-input-label for="name" req="true">Полное наименование ЮЛ или ИП</x-my-input-label>
                    <x-my-input name="name" id="name"
                                placeholder="Общество с ограниченной ответственностью «Ромашка»"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">

                    <x-my-input-label for="sname" req="true">Краткое наименование</x-my-input-label>
                    <x-my-input name="sname" id="sname" placeholder="ООО «Ромашка»"></x-my-input>

                </div>

                <div class="flex flex-col text-sm">

                    <x-my-input-label for="ogrn" req="false">ОГРН</x-my-input-label>
                    <x-my-input name="ogrn" id="ogrn"
                                placeholder="1027739609391"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="inn" req="true">ИНН</x-my-input-label>
                    <x-my-input name="inn" id="inn" placeholder="7734126105"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="kpp" req="false">КПП</x-my-input-label>
                    <x-my-input name="kpp" id="kpp" placeholder="773401001"></x-my-input>
                </div>

            </div>
        </div>

        {{--Контактная информация--}}
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <h2 class="bg-gray-500 text-white p-3 text-2xl">Контактная информация</h2>

            <div class="grid grid-cols-7 gap-5 border p-6">

                <div class="flex flex-col col-span-2 text-sm">
                    <x-my-input-label for="adr" req="false">Адрес</x-my-input-label>
                    <x-my-input name="adr" id="adr"
                                placeholder="119049 г. Москва, ул. Донская, д. 8 стр. 1"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="position" req="false">Должность руководителя</x-my-input-label>
                    <x-my-input name="position" id="position"
                                placeholder="Генеральный директор"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="fio" req="false">ФИО</x-my-input-label>
                    <x-my-input name="fio" id="fio"
                                placeholder="Иванов А.И."></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="phone" req="phone">Телефон</x-my-input-label>
                    <x-my-input name="phone" id="phone"
                                placeholder="+7-909-12-32-12"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="email" req="email">Email</x-my-input-label>
                    <x-my-input name="email" id="email"
                                placeholder="name@sitename.ru"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="www" req="www">Сайт</x-my-input-label>
                    <x-my-input name="www" id="www"
                                placeholder="sitename.ru"></x-my-input>
                </div>

            </div>
        </div>

        {{--Банковские реквизиты>--}}
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <h2 class="bg-gray-500 text-white p-3 text-2xl">Банковские реквизиты</h2>

            <div class="grid grid-cols-7 gap-5 border p-6">

                <div class="flex flex-col col-span-2 text-sm">
                    <x-my-input-label for="bankname" req="true">Наименование банка"</x-my-input-label>
                    <x-my-input name="bankname" id="bankname"
                                placeholder="ПАО банк «ФК открытие»"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="bik" req="true">БИК</x-my-input-label>
                    <x-my-input name="bik" id="bik"
                                placeholder="044525297"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-my-input-label for="bankaccount" req="true">Счет №</x-my-input-label>
                    <x-my-input name="bankaccount" id="bankaccount"
                                placeholder="30101810945250000297"></x-my-input>
                </div>



            </div>
        </div>


        <div>
            <button type="submit" class="">Добавить</button>
        </div>

        {{--</div>--}}

    </form>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
