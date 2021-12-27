@if($req == true)
    <label for="{{ $for }}" class="text-xs mb-2">
        {{ $slot }}
        <span class="text-red-700"> *</span>
    </label>
@else
    <label for="{{ $for }}" req="{{ $req }}" class="text-xs mb-2">
        {{ $slot }}
    </label>
@endif

