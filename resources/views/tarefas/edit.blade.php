@extends('layout')

@section('content')
    <h1 class="mt-5">Editar Tarefa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $tarefa->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description">{{ $tarefa->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection
