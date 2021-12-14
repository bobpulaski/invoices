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
            <x-h3>Реквизиты</x-h3>
            <div class="grid grid-cols-6 gap-5 border p-6">

                <div class="flex flex-col text-sm col-span-2">

                    <x-input-label for="name" req="true">Полное наименование ЮЛ или ИП</x-input-label>
                    <x-my-input name="name" id="name"
                             placeholder="Общество с ограниченной ответственностью «Ромашка»"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">

                    <x-input-label for="sname" req="true">Краткое наименование</x-input-label>
                    <x-my-input name="sname" id="sname" placeholder="ООО «Ромашка»"></x-my-input>

                </div>

                <div class="flex flex-col text-sm">

                    <x-input-label for="ogrn" req="false">ОГРН</x-input-label>
                    <x-my-input name="ogrn" id="ogrn" placeholder="1027739609391"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="inn" req="true">ИНН</x-input-label>
                    <x-my-input name="inn" id="inn" placeholder="7734126105"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="kpp" req="false">КПП</x-input-label>
                    <x-my-input name="kpp" id="kpp" placeholder="773401001"></x-my-input>
                </div>

            </div>
        </div>

        {{--Контактная информация--}}
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <x-h3>Контактная информация</x-h3>

            <div class="grid grid-cols-7 gap-5 border p-6">

                <div class="flex flex-col col-span-2 text-sm">
                    <x-input-label for="adr" req="false">Адрес</x-input-label>
                    <x-my-input name="adr" id="adr"
                             placeholder="119049 г. Москва, ул. Донская, д. 8 стр. 1"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="position" req="false">Должность руководителя</x-input-label>
                    <x-my-input name="position" id="position"
                             placeholder="Генеральный директор"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="fio" req="false">ФИО</x-input-label>
                    <x-my-input name="fio" id="fio"
                             placeholder="Иванов А.И."></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="phone" req="phone">Телефон</x-input-label>
                    <x-my-input name="phone" id="phone"
                             placeholder="+7-909-12-32-12"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="email" req="email">Email</x-input-label>
                    <x-my-input name="email" id="email"
                             placeholder="name@sitename.ru"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="www" req="www">Сайт</x-input-label>
                    <x-my-input name="www" id="www"
                             placeholder="sitename.ru"></x-my-input>
                </div>

            </div>
        </div>

        {{--Банковские реквизиты--}}
        <div class="bg-gray-200 shadow-md rounded mb-6">
            <x-h3>Банковские реквизиты</x-h3>

            <div class="grid grid-cols-7 gap-5 border p-6">

                <div class="flex flex-col col-span-2 text-sm">
                    <x-input-label for="bankname" req="true">Наименование банка"</x-input-label>
                    <x-my-input name="bankname" id="bankname"
                             placeholder="ПАО банк «ФК Открытие»"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="bik" req="true">БИК</x-input-label>
                    <x-my-input name="bik" id="bik"
                             placeholder="044525297"></x-my-input>
                </div>

                <div class="flex flex-col text-sm">
                    <x-input-label for="bankaccount" req="true">Счет №</x-input-label>
                    <x-my-input name="bankaccount" id="bankaccount"
                             placeholder="30101810945250000297"></x-my-input>
                </div>

                <div class="flex flex-col col-span-3 text-sm">
                    <x-input-label for="information" req="false">Дополнительная информация</x-input-label>
                    <x-my-input name="information" id="information"
                             placeholder="..."></x-my-input>
                </div>

            </div>
        </div>

        {{--Кнопки--}}


        <div class="grid grid-cols-6 gap-3">
            <x-simple-button type="submit" bg="bg-green-700" hover="bg-green-900">Сохранить</x-simple-button>
            <x-link-button href="{{ route('partners.index') }}" type="secondary">Отмена</x-link-button>
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
