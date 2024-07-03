<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function switchStatus(Tarefa $tarefa){
        $tarefa->switchStatus();
        return redirect()->back()->with('success', 'Tarefa atualizada com sucesso!');
    }
}
