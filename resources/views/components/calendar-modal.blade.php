<x-layout>

    <div class="min-h-screen flex items-start justify-center mt-16">
        <x-card class="max-w-4xl w-full">

            <div class="flex space-x-2 mb-6 justify-between">
                <h2 class="text-2xl font-bold  text-center">Tarefa: {{$tarefa->titulo}}</h2>
                <x-back-button route="tarefa.calendar">Voltar</x-back-button>
            </div>

            <x-tarefa-tile : :tarefa="$tarefa"/>
        </x-card>
    </div>

</x-layout>



