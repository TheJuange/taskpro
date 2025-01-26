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
            <a class="text-white font-semibold text-sm bg-green-500 rounded-md p-2" href="{{route("create")}}">New
                Task</a>
            <a class="text-neutral-300 text-sm font-semibold" href="">github</a>
        </ul>
    </nav>
    <main class="w-full flex flex-col items-center mt-20">
        <h1 class="text-neutral-300 font-semibold text-3xl">
            My Task List
        </h1>
        <form class="w-2/6 mt-4 bg-neutral-700 rounded-md flex p-2" action="">
            <input class="w-11/12 bg-transparent outline-none text-neutral-300  placeholder:text-neutral-400" type="text" name="search" id="search" placeholder="search task">
            <button class="w1/12" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20"
                width="20">
                    
                    <path fill="#d4d4d4"
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </button>
        </form>

        <section>
            <picture>
                <img src="{{asset("images/fondo.png")}}" alt="">
            </picture>
            <section>
                <p>mi primera tarea</p>
                <p>12/08/2025</p>
                <p>high</p>
            </section>
        </section>
    </main>
</body>

</html>