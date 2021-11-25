@extends('templates.main')

@section('title')Форма добавления контрагента@endsection

@section('content')
    <h1>@yield('title')</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <form action="{{ route('partners.store') }}" method="post">
        @csrf
        @method('POST')
        <div>
            <label for="e-mail">Наименование</label>
            <input type="text" name="org" id="org" />
        </div>

        <div>
            <label for="inn">ИНН</label>
            <input type="text" name="inn" id="inn" />
        </div>

        <div>
            {{--<a href="#" class="inline-block text-blue-500 hover:text-blue-800 hover:underline">Forgot your password?</a>--}}
            <button type="submit">Добавить</button>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
