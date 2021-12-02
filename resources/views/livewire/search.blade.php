<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <input type="text" wire:model="searchTerm" name="partner_id" id="partner_id" />

    <ul>
        @foreach($partners as $partner)
            <li>
                <p>
                    {{ $partner->id }} {{ $partner->name }}
                </p>
            </li>
        @endforeach
    </ul>
</div>