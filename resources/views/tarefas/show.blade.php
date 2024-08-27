@extends('layout')

@section('content')
    <h1 class="mt-5">{{ $tarefa->title }}</h1>
    <p>{{ $tarefa->description }}</p>

    <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning">Editar</a>
    
    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
@endsection
