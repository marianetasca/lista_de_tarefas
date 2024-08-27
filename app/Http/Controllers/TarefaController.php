<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index() {
        $tarefas = Tarefa::all();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        Tarefa::create($request->all());
        return redirect()->route('tarefas.index');
    }

    public function show(Tarefa $tarefa)
    {
        return view('tarefas.show', compact('tarefa'));
    }

    public function edit(Tarefa $tarefa)
    {
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $tarefa->update($request->all());
        return redirect()->route('tarefas.index');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index');
    }

    public function toggleCompleted(Tarefa $tarefa)
    {
    $tarefa->completed = !$tarefa->completed;
    $tarefa->save();

    return redirect()->route('tarefas.index')
        ->with('success', 'Tarefa atualizada com sucesso!');
    }
}