<x-layout>


    <div class="min-h-screen flex justify-center">

        <div class="mb-4 max-w-4xl w-full">

            <x-label>Pesquisar Tarefa</x-label>

            <div class="flex row-auto space-x-2">
                <input type="search" name="search" id="search"
                       class="w-full p-2 border rounded-lg"
                       placeholder="Digite Aqui o nome da Tarefa"
                       value="{{old('search') ?? request('search')}}">

                <button
                    class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100">
                    Procurar
                </button>
                <button
                    class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100">
                    Criar Tarefa
                </button>
            </div>
            <x-error-label>search</x-error-label>


            <div class="filter-container mb-4 mt-4 flex">
                @php

                    $filters = [
                    '' => 'Últimas',
                    'done' => 'Feitas',
                    'not_done' => 'Não Feitas',
                    'late' => 'Atrasadas',
                    'to_be_done' => 'A serem Feitas',
            ];

                @endphp

                @foreach($filters as $key => $label)

                    <a href="{{route('tarefa.index', [...request()->query(),'filter' => $key])}}"
                       class="{{request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item'}}">{{$label}}</a>

                @endforeach
            </div>

            @forelse($tarefas as $tarefa)

                <x-tarefa-tile :tarefa="$tarefa"/>

            @empty

                <div class=" mt-4 rounded-md border border-dashed border-slate-300 p-8 min-h max-w-4xl w-full">
                    <div class="text-center font-medium">
                        Nenhuma Tarefa foi Adicionada Ainda
                    </div>
                    <div class="text-center">
                        As Tarefas Adicionadas serão exibidas Aqui!
                    </div>
                </div>

            @endforelse
        </div>
    </div>


</x-layout>
