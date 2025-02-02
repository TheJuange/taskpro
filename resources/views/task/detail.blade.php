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
        <a href="/" class="text-neutral-300 font-semibold text-3xl">TaskPro</a>
        <ul class="flex items-center space-x-4">
            <a href="{{route("show")}}" class="text-neutral-300 text-sm font-semibold">Lista de Tareas</a>
            <a class="text-neutral-300 text-sm font-semibold" href="https://github.com/TheJuange/taskpro">Github</a>
        </ul>
    </nav>
    <div class="w-full px-4 md:w-1/2 container mx-auto mt-20 flex flex-col gap-5 justify-center">
        @foreach ($task as $item)
        <img src="{{$item->photo}}" alt="{{$item->title}}">
        <h1 class="text-2xl text-neutral-300 uppercase p-2 text-center">{{$item->title}}</h1>
        <p class="text-normal text-neutral-400">{{$item->description}}</p>
        <p class="text-sm text-neutral-600">{{$item->due_date}}</p>
        <p class="@if ($item->priority == 'alta') 
                    bg-red-500 
                @elseif ($item->priority == 'media') 
                    bg-yellow-600 
                @else 
                    bg-green-800 
                @endif 
                rounded-md py-1 px-2 text-neutral-300 w-max">{{$item->priority}}</p>
        <div class="w-full flex justify-center gap-4 mb-4">
            <a href="" class="text-neutral-300 font-semibold">Editar</a>
            <a href="" class="text-neutral-300 font-semibold">Eliminar</a>
        </div>
        @endforeach
    </div>

</body>

</html>