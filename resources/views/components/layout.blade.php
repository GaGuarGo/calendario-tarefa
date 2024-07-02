<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de Tarefas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite('resources/css/app.css')
</head>
<body class="from-10% via-30% to-90% mx-auto  bg-cyan-800 text-slate-700">


@auth

    <nav>

        <div class="flex justify-between py-4 px-8">

            <div class="text-white text-lg font-medium">Lista de Tarefas: {{auth()->user()->name}}</div>
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

<div class="min-h-screen flex items-center justify-center">
    {{$slot}}
</div>

</body>
</html>
