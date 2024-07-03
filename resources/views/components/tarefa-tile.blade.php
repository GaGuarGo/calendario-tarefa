<x-card class="p-4 mt-4">

    <div class="flex space-x-4 items-center">

        <div class="bg-slate-200 h-24 w-24 rounded-md text-center flex items-center justify-center p-2">
            <h4 class="font-bold text-slate-400">
                Prazo: {{$tarefa->getPrazo()}}
            </h4>
        </div>

        <div class="flex-col">
            <div class="flex gap-2 items-center">
                <div class="font-semibold text-lg text-slate-700">
                    {{$tarefa->titulo}}
                </div>
                <x-status-label :status="$tarefa->status"/>
            </div>

            <div>
                {{$tarefa->descricao}}
            </div>

            <div class="flex gap-4 justify-end mt-4">

                <form action="{{route('tarefa.status', $tarefa)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-customized-button color="bg-cyan-200" hoverColor="bg-cyan-400"
                                         text-color="text-cyan-700">{{$tarefa->status ? "Marcar com Não Feito" : "Marcar como Feito" }}</x-customized-button>
                </form>


                <x-customized-button color="bg-blue-200" hoverColor="bg-blue-400" text-color="text-blue-700">Editar Tarefa</x-customized-button>
                <x-customized-button color="bg-red-200" hoverColor="bg-red-400" text-color="text-red-700">Remover Tarefa</x-customized-button>
            </div>

        </div>

    </div>

</x-card>
