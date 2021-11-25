<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>

    <title>@yield('title') - Invocies</title>
</head>
<body>

<div class="wrapper d-flex align-items-stretch">

    <div class="border-end" style="color: #cbd5e0; background-color: #2d3748; min-width: 250px; max-width: 250px;">
        <div class="sidebar-heading border-bottom bg-light p-3 bg" style="color: #2d3748;">
            <strong><a href="/">INVOICE</a></strong>
        </div>
        <div class="list-group list-group-flush">
           <a class="list-group-item list-group-item-action list-group-item-light p-3" href={{ route('partners.index') }}>Контраганты</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href={{ route('partners.create') }}>Добавить контрагента</a>
            {{--<a class="list-group-item list-group-item-action list-group-item-light p-3" href={{ route('invoices') }}>Счета</a>--}}
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Моя организация</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Настройки</a>
        </div>
    </div>


    <div class="d-flex container flex-column min-vh-100 mw-100 p-0">

        <div id="header" class="d-flex justify-content-end border-bottom bg-white p-3 shadow-sm p-3 bg-body">
            <div class="bd-highlight">
                <a href="{{ route ('dashboard') }}">Выйти</a>
                <a href="pdf/generate">PDF</a>
                <x-button type="submit" style="info" message="Красная"/>
                <x-button type="submit" style="success" message="Инфо"/>
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
