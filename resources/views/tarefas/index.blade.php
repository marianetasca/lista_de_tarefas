@extends('layout')

@section('content')
    <h1 class="mt-5">Lista de Tarefas</h1>
    <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-3">Criar Nova Tarefa</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if ($tarefas->isEmpty())
        <p>Nenhuma tarefa encontrada.</p>
    @else
        <ul class="list-group">
            @foreach ($tarefas as $tarefa)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        @if ($tarefa->completed)
                            <form action="{{ route('tarefas.toggleCompleted', $tarefa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i> <!-- Ícone de tarefa concluída -->
                                </button>
                            </form>
                            <s>{{ $tarefa->title }}</s> <!-- Texto riscado para tarefas concluídas -->
                        @else
                            <form action="{{ route('tarefas.toggleCompleted', $tarefa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-times"></i> <!-- Ícone de tarefa não concluída -->
                                </button>
                            </form>
                            {{ $tarefa->title }}
                        @endif
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
