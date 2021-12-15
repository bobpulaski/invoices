<script>
    $(document).ready(function () {
        $(".jo").click(function () {
            $('#m_theme').text(this.dataset.name);
            $(".form-destroy").attr('action', window.location.origin + '/partners/' + this.id);
        });
    });
</script>

<div id="ex1" class="modal w-1/3 bg-gradient-to-b from-pink-100 to-pink-400 flex justify-center items-center">
    <div class="bg-white rounded-lg">
        <div class="w-1/3 pt-6 flex justify-center">

        </div>
        <div class="w-full pr-4">
            <h3 id="m_theme" class="font-bold text-2/l text-red-700">Партнер</h3>
            <p class="py-4 text-sm text-gray-700">Вы уверены, что хотите удалить контрагента <span class="font-bold">{{ $name }}</span>? При удалении вы потеряете все связанные записи с ним. Это действие нельзя отменить.</p>
        </div>

        <div >
            <form class="form-destroy " method="POST" action="">
                @method('delete')
                @csrf

                <div class="flex justify-end pb-3 space-x-5">
                    <a href="#" rel="modal:close"
                       class="bg-gray-700 hover:bg-gray-800 text-white py-2 px-4 rounded mt-3">Отмена</a>
                    <button type="submit" class="bg-red-300 hover:bg-red-800 text-white py-2 px-4 rounded mt-3 ml-3">Удалить</button>
                </div>
            </form>

        </div>
    </div>
</div>
