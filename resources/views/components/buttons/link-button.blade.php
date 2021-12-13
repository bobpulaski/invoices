@switch($type)

    @case ('success')
        <a href="{{ $href }}"
           class="bg-green-700 hover:bg-green-900 transition duration-150 ease-in text-white font-light text-center py-2 px-4 rounded">
            {{ $slot }}
        </a>
        @break

    @case ('secondary')
    <a href="{{ $href }}"
       class="bg-gray-700 hover:bg-gray-900 transition duration-150 ease-in text-white font-light text-center py-2 px-4 rounded">
        {{ $slot }}
    </a>
    @break

@endswitch



