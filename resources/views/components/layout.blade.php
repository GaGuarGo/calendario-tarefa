<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de Tarefas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="from-10% via-30% to-90% mx-auto  bg-cyan-800 text-slate-700">


@auth

    <nav>

        <div class="flex justify-between py-4 px-8">

            <div class="flex space-x-4">
                <a href="{{route('tarefa.index')}}" class="text-white text-lg font-medium hover:underline">Lista de Tarefas: {{auth()->user()->name}}</a>
                <a href="{{route('tarefa.calendar')}}" class="text-white text-lg font-medium hover:underline">Ver Calendário</a>

            </div>

                <div class="text-white text-lg font-medium">
                    <form action="{{route('auth.logout')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Sair</button>
                    </form>
                </div>



        </div>

    </nav>

@endauth
{{$slot}}
</body>
</html>
