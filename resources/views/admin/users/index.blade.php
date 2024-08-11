@extends('admin.layout.main')

@section('title', 'Usuários')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white">
            Usuários
        </h2>
    </div>

    <x-alert/>

    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href={{route('users.create')}}>Novo</a>

    <div class="relative overflow-x-auto my-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Nome</th>
                <th scope="col" class="px-6 py-3">E-mail</th>
                <th scope="col" class="px-6 py-3">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{$user->name}}</td>
                    <td class="px-6 py-4">{{$user->email}}</td>
                    <td class="px-6 py-4">
                        <a  class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('users.edit', $user->id)}}">Editar</a>
                        |
                        <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('users.show', $user->id)}}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{$users->links()}}
    </div>

@endsection
