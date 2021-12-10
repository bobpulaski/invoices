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

        <div class="flex flex-col shadow">
            <h1 class="font-semibold text-3xl text-gray-700 mb-4">@yield('title')</h1>
            <div class="grid grid-cols-5 gap-5">

                <div class="flex flex-col text-sm">

                    <x-my-input-label for="name">Краткое наименование ЮЛ или ИП</x-my-input-label>
                    <x-my-input name="name" id="name" placeholder="ty ty"></x-my-input>

                </div>

                <div class="flex flex-col col-span-2 text-sm">
                    <label for="name" class="text-sm">Полное наименование<span class="text-red-700"> *</span></label>
                    <input type="text" class="rounded text-sm transition duration-200 ease-in" name="name" id="name"
                           placeholder="Общество с ограниченной ответственностью «Ромашка»">
                </div>

                <div class="flex flex-col text-sm">
                    <label for="inn" class="text-sm">ИНН<span class="text-red-700"> *</span></label>
                    <input type="text" class="rounded text-sm transition duration-200 ease-in" name="inn" id="inn"
                           placeholder="7734126105">
                </div>

                <div class="flex flex-col text-sm">
                    <label for="inn" class="text-sm">КПП</label>
                    <input type="text" class="rounded text-sm transition duration-200 ease-in" name="inn" id="inn"
                           placeholder="773401001">
                </div>

            </div>


            <div class="">
                {{--<a href="#" class="inline-block text-blue-500 hover:text-blue-800 hover:underline">Forgot your password?</a>--}}
                <button type="submit" class="">Добавить</button>
            </div>

        </div>

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
