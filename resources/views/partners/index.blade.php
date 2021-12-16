@extends('templates.main')

@php
    $title = 'Контрагенты';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')



{{--    @if(session()->has('success'))
        <div class="bg-green-700 p-3 mb-3 text-white">
            <span class="font-medium">{{ session()->get('hisName') }}</span> {{ session()->get('success') }}
        </div>
    @endif--}}

    <div class="flex flex-row mt-3 mb-3">
        <div class="relative w-full max-w-full flex-grow flex-1">
            <x-h1>{{ $title }}</x-h1>
        </div>
        <div
            class="flex flex-row bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in text-white font-light py-2 px-4 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
            </svg>
            {{--<a class="ml-2 text-sm" href={{ route('partners.create') }}>Создать контрагента</a>--}}
            <a href="#ex2" rel="modal:open" class="ml-2 text-sm">Создать контрагента</a>
            {{--TODO Палец на всю кнопку должен смотреть--}}
        </div>
    </div>

    <table class="items-center bg-transparent w-full border-collapse shadow-lg">
        <thead class="bg-gray-200">
        <tr>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #ID
            </th>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #User_Id
            </th>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #Name
            </th>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs whitespace-nowrap font-semibold text-left">
                #ИНН
            </th>

            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #Invoice
            </th>

            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #Edit
            </th>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #Destroy
            </th>

        </tr>
        </thead>
        <tbody>
        @if (!empty($partners) && $partners->count())
            @foreach ($partners as $el)
                <tr>
                    <td class="text-right border-b px-6 align-middle border-r border-l text-sm whitespace-nowrap p-2 ">{{ $el->id }}</td>
                    <td class="text-right border-b px-6 align-middle border-r text-sm whitespace-nowrap p-2 ">{{ $el->user_id }}</td>
                    <td class="border-b px-6 align-middle border-l-0 border-r text-sm whitespace-nowrap p-2 ">{{ $el->name }}</td>
                    <td class="text-right border-b px-6 align-middle border-r text-sm whitespace-nowrap p-2 ">{{ $el->inn }}</td>

                    {{--<td><a href="confirmation/{{ $el->id }}">Удалить</a></td>--}}

                    <td class="border-b px-6 align-middle border-r text-xs whitespace-nowrap p-2">
                        <a href="{{ route('invoices.create.for.partners' , [$el->id]) }}"
                           title="Добавить счет этому контрагенту">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </td>

                    <td class="border-b px-6 align-middle border-r text-xs whitespace-nowrap p-2">
                        <a role="button" data-bs-toggle="" title="Редактировать"
                           href="{{ route('partners.edit' , [$el->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 hover:text-green-700"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                <path fill-rule="evenodd"
                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </td>

                    <td id='wrapper' class="border-b px-6 align-middle border-r text-xs whitespace-nowrap p-2">
                        {{--<a href="{{ route('partners.delete.confirmation', [$el->id]) }}">Delete</a>--}}
                        <?php
                        $id = $el->id;
                        $name = $el->name;
                        ?>
                        <a id="{{ $id }}" href="#ex1" rel="modal:open" class="jo" data-name="{{ $name }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-300 hover:text-red-700"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm1 8a1 1 0 100 2h6a1 1 0 100-2H7z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </td>


                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif
        </tbody>
    </table>

    {{--Pagination--}}
    <div class="flex justify-end pb-3 mt-5 justify-between">
        <div>{{ $partners->links() }}</div>
        <x-partners-perpage/>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="{{ asset ('css/jquery.modal.css') }}"/>


    <script>
        $(document).ready(function () {
            document.getElementById('rows').value = {{ $rows }};
        });
    </script>

    @include('partners.createModal')
    @include('partners.deleteModal')


@endsection
