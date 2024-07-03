<?php

namespace App\Http\Controllers;

use App\Http\Resources\TarefaResource;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = auth()->user()?->tarefas()->latest();
        $search = request('search');
        $filter = $request->input("filter");

        $query = match ($filter) {
            'today' => $query->todayTasks(),
            'done' => $query->doneTasks(),
            'not_done' => $query->undoneTasks(),
            'late' => $query->lateTasks(),
            'deleted' => $query->deletedTasks(),
            default => $query->latest(),
        };

        if (!empty($search)) {
            $query->where('titulo', 'LIKE', '%' . $search . '%');
        }

        $tarefas = $query->orderBy("prazo")->get();


        return view('tarefa.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'string|required|min:3|max:100',
            'descricao' => 'string|required|min:10|',
            'prazo' => 'date|required',
        ]);

        auth()->user()?->tarefas()->create($validatedData);
        return redirect()->route('tarefa.index')->with('success', 'Tarefa Adicionada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        return view('tarefa.edit', ['tarefa' => $tarefa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $validatedData = $request->validate([
            'titulo' => 'string|required|min:3|max:100',
            'descricao' => 'string|required|min:10|',
            'prazo' => 'date|required',
        ]);

        $tarefa->update($validatedData);
        return redirect()->route('tarefa.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->back()->with('success', 'Tarefa removida com sucesso!');
    }

    public function switchStatus(Tarefa $tarefa)
    {
        $tarefa->switchStatus();
        return redirect()->back()->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function restore(int $id)
    {

        $tarefa = Tarefa::withTrashed()->find($id);


        $tarefa->restore();
        return redirect()->back()->with('success', 'Tarefa restaurada com sucesso!');
    }

    public function forceDestroy(int $id)
    {
        $tarefa = Tarefa::withTrashed()->find($id);

        $tarefa->forceDelete();
        return redirect()->back()->with('success', 'Tarefa removida para sempre!');
    }

    public function getUserTasksJson(){

        $tarefas = Tarefa::where('user_id', auth()->id())->get();

        return TarefaResource::collection($tarefas);
    }

}
