<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskPro</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-neutral-900">
    <nav class="w-full fixed top-0 left-0 flex items-center justify-between p-4 bg-neutral-800">
        <h1 class="text-neutral-300 font-semibold text-3xl">TaskPro</h1>
        <ul class="flex items-center space-x-4">
            <a href="{{route("create")}}" class="text-white font-semibold text-sm bg-green-500 rounded-md p-2" href="">Nueva Tarea</a>
            <a class="text-neutral-300 text-sm font-semibold" href="https://github.com/TheJuange/taskpro">GitHub</a>
        </ul>
    </nav>
    <main class="flex items-center justify-center h-screen">
        <picture class="relative h-4/6  md:h-4/6 px-3">
            <img class="rounded-3xl w-full h-full object-cover" src="{{asset("./images/fondo.png")}}" alt="photo">
            <p class="text-white font-semibold text-2xl md:text-6xl absolute bottom-20 left-10">Un lugar para registrar tus tareas</p>
            <a href="{{route("create")}}" class="text-white font-semibold text-sm bg-green-500 rounded-md p-2 absolute bottom-5 left-10">Nueva Tarea</a>
        </picture>
    </main>
    @vite('resources/js/app.js')
</body>
</html>