<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskPro</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-900 ">
    <nav class="w-full fixed top-0 left-0 flex items-center justify-between p-4 bg-neutral-800">
        <a href="/" class="text-neutral-300 font-semibold text-3xl">TaskPro</a>
        <ul class="flex items-center space-x-4">
            <a href="{{route("show")}}" class="text-neutral-300 text-sm font-semibold">Lista de Tareas</a>
            <a class="text-neutral-300 text-sm font-semibold" href="https://github.com/TheJuange/taskpro">Github</a>
        </ul>
    </nav>

    <div class="w-full px-4 md:w-1/2 container mx-auto mt-20 flex flex-col justify-center">
        @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{route("store")}}" class="bg-neutral-800 rounded-md flex flex-col w-full my-9 p-9" method="POST"
            enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
            @csrf

            <h1 class="text-neutral-300 text-center font-semibold text-3xl">Editar Tarea</h1>
            <label class="text-neutral-300 mb-2" for="title">Titulo de tarea</label>
            <input class="p-2 rounded-md outline-none mb-4 text-neutral-900" type="text" name="title" id="title"
                value="{{ $tasks->title }}">
            @error('title')
            <div class="mb-4">
                <p class="text-red-500 text-sm">{{ $message }}</p>
            </div>
            @enderror
            
            <label class="text-neutral-300 mb-2" for="due_date">Fecha de Inicio</label>
            <input class="p-2 rounded-md outline-none mb-4" type="date" name="due_date" id="due_date" value="{{$tasks->due_date}}">
            @error('due_date')
            <div class="mb-4">
                <p class="text-red-500 text-sm">{{ $message }}</p>
            </div>
            @enderror
            
            <label class="text-neutral-300 mb-2" for="description">Descripción</label>
            <textarea class="p-2 rounded-md outline-none mb-4" name="description" id="description" cols="30" rows="5">{{$tasks->description}}</textarea>
            @error('description')
            <div class="mb-4">
                <p class="text-red-500 text-sm">{{ $message }}</p>
            </div>
            @enderror
            
            <label class="text-neutral-300 mb-2" for="priority">Prioridad</label>
            <select class="p-2 rounded-md outline-none mb-4" name="priority" id="priority">
                <option value="{{$tasks->priority}}" disabled selected>{{$tasks->priority}}</option>
                <option value="baja">Baja</option>
                <option value="media">Media</option>
                <option value="alta">Alta</option>
            </select>
            @error('priority')
            <div class="mb-4">
                <p class="text-red-500 text-sm">{{ $message }}</p>
            </div>
            @enderror
            
            <label class="text-neutral-300 mb-2" for="photo">Foto <span class="text-sm text-neutral-500">(Opcional)</span></label>
            <input class="p-2 rounded-md outline-none mb-4 text-neutral-300 bg-neutral-700" type="file" name="photo" id="photo">
            @error('photo')
            <div class="mb-4">
                <p class="text-red-500 text-sm">{{ $message }}</p>
            </div>
            @enderror
            
            <button class="bg-green-500 rounded p-2 uppercase text-white font-semibold" type="submit">Crear
                Tarea</button>
           
        </form>
    </div>
</body>

</html>

