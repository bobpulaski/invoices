<ul class="flex flex-col">
    <li class="flex flex-col items-center bg-gray-700 p-5 border-b-2">
        <div class="rounded-full h-16 w-16 flex justify-center">
            <img src="https://www.madietenligne.fr/images/man-4.png" alt="">
        </div>
        <div class="text-white text-xs font-semibold p-3">{{ Auth::user()->name }}</div>
    </li>

    <li class="h-16">
        <a href="/dashboard">Доска</a>
    </li>

    <li class="h-16">
        <a href={{ route('partners.index') }}>Контраганты</a>
    </li>

    <li class="h-16">
        <a href={{ route('partners.create') }}>Добавить контрагента</a>
    </li>
</ul>

