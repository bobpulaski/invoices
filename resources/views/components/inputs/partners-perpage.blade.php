<div>
    <form id="paginate" action="{{ route('partners.index') }}" method="get">
        <label for="rows" class="ml-3 mr-3 text-sm">Записей на страницу</label>
        <select name="rows" id="rows" class="text-sm" onchange="this.form.submit()">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
    </form>
</div>
