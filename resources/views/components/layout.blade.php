<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de Tarefas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css'])
</head>
<body class="from-10% via-30% to-90% mx-auto  bg-slate-50 text-slate-700">

@auth
    @if($notShowNavBar ?? true)
        <nav class="bg-white border-bottom shadow-sm mb-8">
            <div class="flex justify-between py-6 px-8 text-black text-lg font-normal items-center ">
                <h5 class="my-0 mr-md-auto font-weight-normal">Lista de Tarefas</h5>

                <div class="font-weight-normal text-sm flex items-center space-x-4">
                    <div class="flex">
                        <h5>Link da Minha Lista de Tarefa: </h5>
                        <a id="link-tarefa" class="text-blue-800 font-bold ml-1"
                           href="{{route('tarefa.public-calendar', auth()->user()?->lista_url )}}">
                            http://127.0.0.1:8000/meu-calendario/{{auth()->user()?->lista_url}}
                        </a>
                    </div>
                </div>

                <div class="flex space-x-8">
                    <div class="flex space-x-4 items-center">
                        <a href="{{route('tarefa.index')}}" class="text-dark hover:underline">Minha Lista</a>
                        <a href="{{route('tarefa.calendar')}}" class=" text-dark  hover:underline">Ver
                            Calendário</a>

                    </div>

                    <div>
                        <form action="{{route('auth.logout')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class=" text-red font-bold">Sair</button>
                        </form>
                    </div>
                </div>


            </div>

        </nav>
    @endif

@endauth
{{$slot ?? null}}

@stack('scripts')
</body>
</html>
