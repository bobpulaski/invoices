@extends('templates.main')

@section('title')Форма добавления контрагента@endsection

@section('content')
    <h1>@yield('title')</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div >
        <form class="row mt-5" action="{{ route('partners.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3 col">
                <label for="name" class="form-label">Наименование</label>
                <input type="text" class="form-control" name="name" id="name">
                <div id="emailHelp" class="form-text">Например, ООО «Ромашка»</div>
            </div>

            <div class="mb-3 col">
                <label for="inn" class="form-label">ИНН</label>
                <input type="text" class="form-control" name="inn" id="inn">
                <div id="emailHelp" class="form-text">ИНН юридического лица - 10 цифр, ИП - 12</div>
            </div>

            <div class="mb-3 col-12">
                {{--<a href="#" class="inline-block text-blue-500 hover:text-blue-800 hover:underline">Forgot your password?</a>--}}
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
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

@endsection
