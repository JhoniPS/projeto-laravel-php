@extends('admin.layout.main')

@section('title', "Detalhes de Usuário")

@section('content')
    <h1>Detalhes de Usuário</h1>
    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
    </ul>

    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Excluir
            Usuário
        </button>
    </form>
@endsection
