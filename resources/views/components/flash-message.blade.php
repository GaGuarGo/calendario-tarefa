@if(session('success'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-200 p-4 text-green-700 opacity-75">
        <p class="font-bold">Sucesso!</p>
        <p>{{session('success')}}</p>
    </div>
@endif

@if(session('error'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-200 p-4 text-red-700 opacity-75">
        <p class="font-bold">Erro!</p>
        <p>{{session('error')}}</p>
    </div>
@endif
