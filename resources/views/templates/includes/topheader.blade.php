<div class="flex flex-row-reverse p-4 shadow-md">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" title="Выход"
                class="flex flex-row text-sm border-2 hover:bg-gray-200 text-gray-500 p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
    </form>
</div>
