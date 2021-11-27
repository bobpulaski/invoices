@extends('templates.main')

@php
    $title = 'Контрагенты';
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="relative w-full mb-4 max-w-full flex-grow flex-1">
        <h1 class="font-semibold text-base text-blueGray-700">Контрагенты</h1>
    </div>


    @if(session()->has('success'))
        <div class="bg-green-700 p-3 mb-3 text-white">
            <span class="font-medium">{{ session()->get('hisName') }}</span> {{ session()->get('success') }}
        </div>
    @endif

    <table class="items-center bg-transparent w-full border-collapse shadow-lg">
        <thead class="bg-gray-200">
        <tr>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #ID
            </th>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #Name
            </th>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs whitespace-nowrap font-semibold text-left">
                #Inn
            </th>
            <th class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase whitespace-nowrap font-semibold text-left">
                #User_Id
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
                    <td class="border-b px-6 align-middle border-l-0 border-r text-sm whitespace-nowrap p-2 ">{{ $el->name }}</td>
                    <td class="text-right border-b px-6 align-middle border-r text-sm whitespace-nowrap p-2 ">{{ $el->inn }}</td>
                    <td class="text-right border-b px-6 align-middle border-r text-sm whitespace-nowrap p-2 ">{{ $el->user_id }}</td>
                    {{--<td><a href="confirmation/{{ $el->id }}">Удалить</a></td>--}}

                    <td class="border-b px-6 align-middle border-r text-xs whitespace-nowrap p-2 ">
                        <a role="button" data-bs-toggle=""
                           href="{{ route('partners.edit' , [$el->id]) }}">
                            <svg class="text-right" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                            </svg>
                        </a>
                    </td>

                    <td class="border-b px-6 align-middle border-r text-xs whitespace-nowrap p-2" >
                        <form method="POST" action="{{ route('partners.destroy' , [$el->id]) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                    <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                </svg>
                            </button>
                        </form>
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
    <div class="flex mt-3">
        {{ $partners->links() }}
    </div>

@endsection
