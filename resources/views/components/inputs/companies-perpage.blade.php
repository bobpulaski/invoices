<div>
    <form id="paginate" action="{{ route('companies.index') }}" method="get">
        <label for="rows" class="ml-3 mr-3 text-xs">Записей на страницу</label>
        <select name="rows" id="rows"
                class="text-xs rounded border-gray-400 transition duration-200 ease-in focus:ring-1 focus:ring-blue-400 focus:border-transparent"
                onchange="this.form.submit()">

            <option value="15">15</option>
            <option value="25">25</option>
            <option value="50">50</option>

        </select>
    </form>
</div>
