<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <title>@yield('title') - Invocies</title>
    @livewireStyles
</head>
<body>

<div class="flex flex-row h-screen">

    <div id="LeftSide" class="w-64 flex-shrink-0 bg-gray-700">
        @include('templates.includes.leftside')
    </div>

    <div id="RightSide" class="flex flex-grow">

        <div class="flex flex-grow flex-col justify-between">

            {{--Header Area--}}
            <div id="topheader">
                @include('templates.includes.topheader')
            </div>

            {{--Main Content Area--}}
            <div id="content" class="h-screen p-5 overflow-y-auto">
                @yield('content')
            </div>

            <div id="footer" class="flex justify-end p-3 border-t">
                @if(isset($partners) and $partners != null)
                    <div>
                        <p class="text-xs text-gray-400">Записей {{ $partners->count() }} из {{ $total }}</p>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>

@livewireScripts
</body>
</html>
