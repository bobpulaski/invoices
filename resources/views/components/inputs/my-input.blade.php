<input type="text"
       class="font-bold rounded text-sm transition duration-200 ease-in focus:ring-2 focus:ring-cyan-700 focus:border-transparent"
       name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}">
@error($name)
    <p class="text-red-600 text-xs mt-1 ml-1">{{ $message }}</p>
@enderror

