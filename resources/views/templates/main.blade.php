<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title') - Invocies</title>
</head>
<body>
<div class="flex flex-row h-screen">

    <div id="LeftSide" class="w-64 flex-shrink-0 bg-gray-700">
        @include('templates.includes.leftside')
    </div>

    <div id="RightSide" class="flex flex-grow">

        <div class="flex flex-grow flex-col justify-between">

            {{--Header Area--}}
            <div class="header">
                @include('templates.includes.topheader')
            </div>

            {{--Main Content Area--}}
            <div id="content" class="h-screen p-5 overflow-y-auto">
                @yield('content')
            </div>

            <div id="footer" class="bg-yellow-200">
                <p>© 2021 Invoice</p>
            </div>

        </div>

    </div> <!-- RightSide -->


    <!--<div class="flex flex-col flex-grow justify-between bg-red-800">

        <div id="includes" class="bg-blue-200">
            <p>Header</p>
            <p>Header</p>
            <p>Header</p>
        </div>

        <div id="content" class="flex-auto bg-yellow-200 overflow-y-auto">
            <div class="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste magni quidem tenetur. Assumenda consequatur cumque eos magnam nisi nobis omnis! Aperiam aut corporis deserunt eaque excepturi facere fugit ipsam nam natus porro reprehenderit sit temporibus, totam ut voluptate! Amet aperiam at autem beatae consequatur, cumque eaque ex id ipsa minima natus nobis non perferendis reprehenderit saepe voluptates voluptatum? Ad alias consequuntur dolore doloremque dolores eum harum illo minus nam nemo nesciunt perspiciatis placeat quibusdam ratione rem saepe, sed similique soluta sunt tempore tenetur totam unde. Ad dolorem eaque illo iste laudantium minima modi molestiae nam nisi quibusdam reprehenderit sit, vel.</p>
            </div>
        </div>

        <div id="footer" class="bg-green-200">
            <p>Footer</p>
            <p>Footer</p>
            <p>Footer</p>
        </div>

    </div>-->
</div>
</body>
</html>

{{--
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <title>@yield('title') - Invocies</title>
</head>
<body>

<div class="wrapper d-flex align-items-stretch">

    <div class="border-end" style="color: #cbd5e0; background-color: #2d3748; min-width: 250px; max-width: 250px;">
        <div class="sidebar-heading border-bottom bg-light p-3 bg" style="color: #2d3748;">
            <strong><a href="/">INVOICE</a></strong>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3"
               href={{ route('partners.index') }}>Контраганты</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3"
               href={{ route('partners.create') }}>Добавить контрагента</a>
            --}}
{{--<a class="list-group-item list-group-item-action list-group-item-light p-3" href={{ route('invoices') }}>Счета</a>--}}{{--

            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Моя организация</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Настройки</a>
        </div>
    </div>


    <div class="d-flex container flex-column min-vh-100 mw-100 p-0">

        <div id="includes" class="d-flex justify-content-end border-bottom bg-white p-3 shadow-sm p-3 bg-body">
            <div class="bd-highlight">
                <div class="dropdown">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Выход</button>
                            </form>

                        </li>
                    </ul>
                </div>
                --}}
{{--<a href="{{ route ('dashboard') }}">Выйти</a>
                <a href="pdf/generate">PDF</a>--}}{{--

                --}}
{{--<x-button type="submit" style="info" message="Красная"/>
                <x-button type="submit" style="success" message="Инфо"/>--}}{{--

            </div>
        </div>

        <div id="content" class="p-3 h-100 m-100">
            @yield('content')
        </div>

        <div class="d-flex bg-light border-top p-3 text-secondary justify-content-end">
            <p>© 2021 Invoice</p>
        </div>

    </div>


</div>

</body>
</html>
--}}
