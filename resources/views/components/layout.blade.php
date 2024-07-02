<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de Tarefas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite('resources/css/app.css')
</head>
<body class="from-10% via-30% to-90% mx-auto mt-0 max-w-2xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">
    {{$slot}}
</body>
</html>
