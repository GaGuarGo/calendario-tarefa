<x-layout>
    <div class="min-h-screen flex items-start justify-center mt-40">
        <x-card class="max-w-xl w-full">



            <div class="flex h-min mb-4 items-center justify-between">
                <h2 class="text-2xl font-bold text-center">Criar Tarefa</h2>
                <x-back-button route="tarefa.index"/>
            </div>


            <div class="mb-4">
                <label for="title" class="block text-gray-700">Título da Tarefa:</label>
                <input type="text" name="title" id="title"
                       class="w-full p-2 border rounded-lg @error('title') border-red-500 @enderror"
                       value="{{old('title') ?? request('title')}}">
                <x-error-label>title</x-error-label>

            </div>
            <div class="mb-4">
                <label for="descricao" class="block text-gray-700">Descrição da Tarefa:</label>
                <input type="text" name="descricao" id="descricao"
                       class="w-full p-2 border rounded-lg @error('descricao') border-red-500 @enderror"
                       value="{{old('descricao') ?? request('descricao')}}">
                <x-error-label>descricao</x-error-label>

            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700">Prazo da Tarefa:</label>
                <input type="date" name="date" id="date"
                       class="w-full p-2 border rounded-lg @error('date') border-red-500 @enderror"
                       value="{{old('date') ?? request('date')}}">
                <x-error-label>prazo</x-error-label>

            </div>



        <x-button>Adicionar</x-button>
        </x-card>
    </div>
</x-layout>
