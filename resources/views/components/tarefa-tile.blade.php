<x-card class="p-4 mt-4">

    <div class="flex space-x-4 items-center">

        <div class="bg-slate-200 h-24 w-24 rounded-md text-center flex items-center justify-center p-2">
            <h4 class="font-bold text-slate-400">
                Prazo: {{$tarefa->getPrazo()}}
            </h4>
        </div>

        <div class="flex-col w-full">
            <div class="flex gap-2 items-center justify-between">
                <div class="font-semibold text-lg text-slate-700">
                    {{$tarefa->titulo}}
                </div>
                <div class="flex space-x-2">
                    <x-status-label :status="$tarefa->status"/>
                    @if($tarefa->isLate() && !$tarefa->status)
                        <div class=
                                     'rounded-xl border px-2 py-1
                                     border-yellow-300 bg-yellow-200 text-yellow-700'>
                            Atrasada
                        </div>

                    @endif

                </div>
            </div>

            <div>
                {{$tarefa->descricao}}
            </div>

            <div class="flex gap-4 justify-end mt-4 items-center">

                <form action="{{route('tarefa.status', $tarefa)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-customized-button link="" color="bg-cyan-200" hover="cyan"
                                         text-color="text-cyan-700">{{$tarefa->status ? "Marcar com Não Feito" : "Marcar como Feito" }}</x-customized-button>
                </form>


                <x-customized-button :link="route('tarefa.edit', $tarefa)" color="bg-blue-200" hover="blue" text-color="text-blue-700">Editar
                    Tarefa
                </x-customized-button>
                <form action="{{route('tarefa.destroy', $tarefa)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <x-customized-button  link=""  color="bg-red-200" hover="red" text-color="text-red-700">Remover
                        Tarefa
                    </x-customized-button>
                </form>
            </div>

        </div>

    </div>

</x-card>
