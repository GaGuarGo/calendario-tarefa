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

            <div class="flex gap-4 justify-between mt-4 items-center">

                <div class="space-x-2 flex bg-cyan-800 p-2 text-white rounded-md">

                    <div>Início {{\Carbon\Carbon::parse($tarefa->start)->format('H:i')}}</div>
                    <div> - </div>
                    <div>Fim {{\Carbon\Carbon::parse($tarefa->end)->format('H:i')}}</div>

                </div>

               <div class="flex space-x-2">
                   @if($tarefa->isDeleted())

                       <form action="{{route('tarefa.restore', $tarefa)}}" method="POST">
                           @csrf
                           @method('PUT')
                           <x-customized-button link="" color="yellow">
                               Restaurar Tarefa
                           </x-customized-button>
                       </form>

                       <form action="{{route('tarefa.forceDestroy', $tarefa)}}" method="POST">
                           @method('DELETE')
                           @csrf
                           <x-customized-button link="" color="red">Remover
                               Definitivamente
                           </x-customized-button>
                       </form>

                   @else
                       <form action="{{route('tarefa.status', $tarefa)}}" method="POST">
                           @csrf
                           @method('PUT')
                           <x-customized-button link=""
                                                color="cyan">{{$tarefa->status ? "Marcar com Não Feito" : "Marcar como Feito" }}</x-customized-button>
                       </form>


                       <x-customized-button :link="route('tarefa.edit', $tarefa)" color="blue">Editar
                           Tarefa
                       </x-customized-button>
                       <form action="{{route('tarefa.destroy', $tarefa)}}" method="POST">
                           @method('DELETE')
                           @csrf
                           <x-customized-button link="" color="red">Remover
                               Tarefa
                           </x-customized-button>
                       </form>
                   @endif
               </div>
            </div>

        </div>

    </div>

</x-card>
