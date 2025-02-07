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
        <a class="text-neutral-300 font-semibold text-3xl" href="/">TaskPro</a>
        <ul class="flex items-center space-x-4">
            <a class="text-white font-semibold text-sm bg-green-500 rounded-md p-2" href="{{route("create")}}">Nueva Tarea</a>
            <a class="text-neutral-300 text-sm font-semibold" href="https://github.com/TheJuange/taskpro">GitHub</a>
        </ul>
    </nav>
    <main class="w-full flex flex-col items-center mt-20 mb-10">
        <h1 class="text-neutral-300 font-semibold text-3xl">
            My Lista de Tareas
        </h1>
        <form class="w-2/6 mt-4 bg-neutral-700 rounded-md flex p-2" action="{{route("search")}}" method="post">
            @csrf
            <input class="w-11/12 bg-transparent outline-none text-neutral-300  placeholder:text-neutral-400"
                type="text" name="search" id="search" placeholder="Buscar Tarea">
            <button class="w1/12" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20" width="20">

                    <path fill="#d4d4d4"
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </button>
        </form>

        @forelse ($tasks as $task )

        <section class="w-3/6 mt-10 flex gap-4 items-center">
            <picture class="w-2/12 ">
                <img class="rounded-full object-cover aspect-square" src="{{$task->photo}}" alt="{{$task->title}}">
            </picture>
            <section class="w-9/12 flex flex-col gap-2">
                <p class="text-neutral-300 text-2xl font-semibold capitalize">{{$task->title}}</p>
                <p class="text-sm text-neutral-700 font-semibold">{{$task->due_date}}</p>
                <p class="@if ($task->priority == 'alta') 
                    bg-red-500 
                @elseif ($task->priority == 'media') 
                    bg-yellow-600 
                @else 
                    bg-green-800 
                @endif 
                rounded-md py-1 px-2 text-neutral-300 w-max">
                    {{ $task->priority }}
                </p>
            </section>
            <section class="w-1/12 flex gap-4">
                <a class="text-neutral-300 font-semibold" href="{{route("show_id",$task->id)}}"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 576 512"><path fill="#D4D4D4" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></a>
                <a class="text-neutral-300 font-semibold" href="{{route("edit",$task->id)}}"><svg xmlns="http://www.w3.org/2000/svg" height="20"
                        width="20" viewBox="0 0 512 512">
                        <path fill="#D4D4D4"
                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                    </svg></a>
                <a class="text-neutral-300 font-semibold" href=""><svg xmlns="http://www.w3.org/2000/svg" height="20"
                        width="20" viewBox="0 0 448 512">
                        <path fill="#d4d4d4"
                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                    </svg></a>
            </section>
        </section>
        @empty
            <section class="w-3/6 mt-10 flex gap-4 items-center">
                <p class="text-neutral-300 font-semibold text-2xl">No se han encontrado tareas</p>
            </section>
        @endforelse

    </main>
</body>

</html>