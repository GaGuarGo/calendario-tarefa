<x-layout>


    <div class="min-h-screen flex justify-center">

        <div class="mb-4 max-w-4xl w-full">

            <x-label>Pesquisar Tarefa</x-label>


            <form action="{{route('tarefa.index')}}" method="GET">
                <div class="flex space-x-2">


                    <input type="text" name="search" id="search"
                           class="w-full p-2 border rounded-lg"
                           placeholder="Digite Aqui o nome da Tarefa"
                           value="{{old('search') ?? request('search')}}">

                    @if(request('search'))
                        <button
                            value=' ' name="search" id="search"
                            class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100">
                            Limpar
                        </button>
                    @endif

                    <button
                        class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100">
                        Procurar
                    </button>


                    <a href="{{route('tarefa.create')}}"
                       class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100">
                        Criar Tarefa
                    </a>
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                </div>
            </form>

            <x-error-label>search</x-error-label>


            <div class="filter-container mb-4 mt-4 flex">
                @php

                    $filters = [
                    '' => 'Todas',
                    'today' => 'Hoje',
                    'done' => 'Feitas',
                    'not_done' => 'Não Feitas',
                    'late' => 'Atrasadas',
                    'deleted' => 'Excluidas'
            ];

                @endphp

                @foreach($filters as $key => $label)

                    <a href="{{route('tarefa.index', [...request()->query(),'filter' => $key])}}"
                       class="{{request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item'}}">{{$label}}</a>

                @endforeach
            </div>

            <x-flash-message/>

            @forelse($tarefas as $tarefa)

                <x-tarefa-tile :tarefa="$tarefa"/>

            @empty

                <div class=" mt-4 rounded-md border border-dashed border-slate-300 p-8 min-h max-w-4xl w-full">
                    <div class="text-center font-medium">
                        Nenhuma Tarefa foi Encontrada
                    </div>
                    <div class="text-center">
                        As Tarefas Adicionadas serão exibidas Aqui!
                    </div>
                </div>

            @endforelse


        </div>
    </div>


</x-layout>
