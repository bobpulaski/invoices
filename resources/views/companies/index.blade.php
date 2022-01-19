@extends('templates.main')

@php
    $title = 'Мои организации';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @if(session()->has('success'))
        <div class="bg-cyan-700 p-3 mb-3 text-gray-100 rounded">
            <span
                class="font-medium">Организация <strong>{{ session()->get('hisName') }}</strong></span> {{ session()->get('success') }}
        </div>
    @endif

    <div class="flex flex-row mt-3 mb-3 items-end">
        <div class="relative w-full max-w-full flex-grow flex-1">
            <x-h1>{{ $title }}</x-h1>
            <p class="text-gray-600 text-xs py-2">Список ваших организаций. Организаций может быть несколько.</p>
        </div>

        <a class="ml-2 text-sm" href="{{ route('companies.create') }}" title="Добавить компанию">
            <div
                class="flex flex-row border border-gray-400 transition duration-150 ease-in hover:border-gray-600 font-light py-2 px-4 rounded text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </a>
    </div>

    <table id="myTable" class="w-full items-center bg-transparent border-collapse shadow-lg">
        <thead class="bg-gray-200 rounded">
        <tr>
            <x-th>user_id</x-th>
            <x-th>id</x-th>
            <x-th>name</x-th>
            <x-th>inn</x-th>
            <x-th>kpp</x-th>
            {{--<x-th>address</x-th>--}}
            {{--<x-th>head_position</x-th>--}}
            {{--<x-th>head_name</x-th>--}}
            <x-th>bank_name</x-th>
            <x-th>bank_account</x-th>
            <x-th>phone</x-th>
            <x-th>email</x-th>
            {{--<x-th>site</x-th>--}}
            <x-th>Действие</x-th>
        </tr>
        </thead>
        <tbody>
        @if (!empty($companies) && $companies->count())
            @foreach ($companies as $el)
                <tr>
                    <x-td>{{ $el->user_id }}</x-td>
                    <x-td>{{ $el->id }}</x-td>
                    <x-td>{{ $el->name }}</x-td>
                    <x-td>{{ $el->inn }}</x-td>
                    <x-td>{{ $el->kpp }}</x-td>
                    {{--<x-td>{{ $el->address }}</x-td>--}}
                    {{--<x-td>{{ $el->head_position }}</x-td>--}}
                    {{--<x-td>{{ $el->head_name }}</x-td>--}}
                    <x-td>{{ $el->bank_name }}</x-td>
                    <x-td>{{ $el->bank_account }}</x-td>
                    <x-td>{{ $el->phone }}</x-td>
                    <x-td>{{ $el->email }}</x-td>
                    {{--<x-td>{{ $el->site }}</x-td>--}}
                    <x-td class="flex flex-row">
                        <a role="button" data-bs-toggle="" title="Редактировать"
                           href="{{ route('companies.edit' , [$el->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 text-green-500 hover:text-green-700"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                <path fill-rule="evenodd"
                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>

                        @php
                            $id = $el->id;
                            $name = $el->name;
                        @endphp
                        <a id="{{ $id }}" href="#ex1" rel="modal:open" class="jo"
                           data-name="{{ $name }}"
                           title="Удалить {{ $el->name }}">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 text-red-300 hover:text-red-700"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm1 8a1 1 0 100 2h6a1 1 0 100-2H7z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </x-td>

                </tr>
            @endforeach
        @else
            <tr>
                <td class="p-3" colspan="10">Вы пока не добавили ни одной организации.</td>
            </tr>
        @endif
        </tbody>
    </table>

        {{--Pagination--}}
        <div class="flex justify-end pb-3 mt-5 justify-between">
            <div>{{ $companies->links() }}</div>
            <x-companies-perpage/>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="{{ asset ('css/jquery.modal.css') }}"/>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bm/dt-1.11.3/cr-1.5.5/r-2.2.9/sr-1.1.0/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bm/dt-1.11.3/cr-1.5.5/r-2.2.9/sr-1.1.0/datatables.min.js"></script>

        {{--TODO Подключить все скрипты локально--}}

        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({
                    "paging": false,
                    "info": false,
                    "searching": true,
                    "colReorder": true,
                    "colReorder.realtime": false,
                    "stateSave": true,
                    "bAutoWidth": false,
                    "autoWidth": true,
                });
            });
        </script>

        @include('companies.deleteModal')

@endsection



