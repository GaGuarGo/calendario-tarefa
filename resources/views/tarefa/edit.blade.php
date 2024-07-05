
<x-layout>
    <div class="min-h-screen flex items-start justify-center mt-40">
        <x-card class="max-w-xl w-full">

            <form action="{{route('tarefa.update', $tarefa)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex h-min mb-4 items-center justify-between">
                    <h2 class="text-2xl font-bold text-center">Editar Tarefa</h2>
                    <div class="space-x-2 flex">
                        <x-back-button route="tarefa.index">Voltar</x-back-button>
                        <x-back-button route="tarefa.calendar">Voltar Calendário</x-back-button>
                    </div>
                </div>


                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700">Título da Tarefa:</label>
                    <input type="text" name="titulo" id="titulo"
                           class="w-full p-2 border rounded-lg @error('titulo') border-red-500 @enderror"
                           value="{{$tarefa->titulo}}">
                    <x-error-label>titulo</x-error-label>

                </div>
                <div class="mb-4">
                    <label for="descricao" class="block text-gray-700">Descrição da Tarefa:</label>
                    <input type="text" name="descricao" id="descricao"
                           class="w-full p-2 border rounded-lg @error('descricao') border-red-500 @enderror"
                           value="{{$tarefa->descricao}}">
                    <x-error-label>descricao</x-error-label>

                </div>

                <div class="flex w-full mb-4 space-x-4">
                    <div class="flex-grow">
                        <label for="prazo" class="block text-gray-700">Prazo da Tarefa:</label>
                        <input type="date" name="prazo" id="prazo"
                               class="w-full p-2 border rounded-lg @error('prazo') border-red-500 @enderror"
                               value="{{$tarefa->prazo}}">
                        <x-error-label>prazo</x-error-label>
                    </div>
                    <div class="flex-grow">
                        <label for="start" class="block text-gray-700">Início:</label>
                        <input type="time" name="start" id="start"
                               class="w-full p-2 border rounded-lg @error('start') border-red-500 @enderror"
                               value="{{substr($tarefa->start, 0,5)}}">
                        <x-error-label>start</x-error-label>
                    </div>
                    <div class="flex-grow">
                        <label for="end" class="block text-gray-700">Final:</label>
                        <input type="time" name="end" id="end"
                               class="w-full p-2 border rounded-lg @error('end') border-red-500 @enderror"
                               value="{{substr($tarefa->end, 0,5)}}">
                        <x-error-label>end</x-error-label>
                    </div>
                </div>



                <x-button>Editar</x-button>
            </form>

        </x-card>
    </div>
</x-layout>
