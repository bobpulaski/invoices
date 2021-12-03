<ul class="flex flex-col">
    <li class="flex flex-col items-center bg-gray-700 p-5 border-b-2">
        <div class="rounded-full h-16 w-16 flex justify-center">
            <img src="https://www.madietenligne.fr/images/man-4.png" alt="">
        </div>
        <div class="text-white text-xs font-semibold p-3">{{ Auth::user()->name }}</div>
    </li>

    <li>
        <a class="flex h-16 p-3 text-gray-300 items-center align-middle hover:bg-red-700" href="/dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-300 mr-3 h-6 w-6 align-middle" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            DASHBOARD
        </a>
    </li>

    <li>
        <a class="flex h-16 p-3 text-gray-300 justify-start items-center align-middle hover:bg-red-700" href={{ route('partners.index') }}>
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-300 mr-3 h-6 w-6 align-middle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            КОНТРАГЕНТЫ
        </a>
    </li>

    <li>
        <a class="flex h-16 p-3 text-gray-300 justify-start items-center align-middle hover:bg-red-700" href={{ route('invoices.index') }}>
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-300 mr-3 h-6 w-6 align-middle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            СЧЕТА
        </a>
    </li>

    <li class="h-16">

    </li>
</ul>

