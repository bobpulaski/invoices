<div id="header" class="bg-blue-200">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выход</button>
    </form>
</div>
