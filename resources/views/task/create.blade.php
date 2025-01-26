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
            <a href="{{route("show")}}" class="text-neutral-300 text-sm font-semibold">Task List </a>
            <a class="text-neutral-300 text-sm font-semibold" href="">github</a>
        </ul>
    </nav>
    <div class="w-full px-4 md:w-1/2 container mx-auto mt-20 flex justify-center">
        <form action="" class="bg-neutral-800 p-4 rounded-md flex flex-col w-full my-9 p-9" method="POST">
            <h1 class="text-neutral-300 text-center font-semibold text-3xl">Create Task</h1>
            <label class="text-neutral-300 mb-2" for="title">Name Task</label>
            <input class="p-2 rounded-md outline-none mb-4 text-neutral-900" type="text" name="title" id="title">

            <label class="text-neutral-300 mb-2" for="title">Start Date</label>
            <input class="p-2 rounded-md outline-none mb-4" type="date" name="title" id="title">

            <label class="text-neutral-300 mb-2" for="description">Description</label>
            <textarea class="p-2 rounded-md outline-none mb-4" name="description" id="description" cols="30"
                rows="5"></textarea>

            <label class="text-neutral-300 mb-2" for="priority">Priority</label>
            <select class="p-2 rounded-md outline-none mb-4" name="priority" id="priority">
                <option value="" disabled selected>Select an option</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <label class="text-neutral-300 mb-2" for="">Photo <span class="text-sm text-neutral-500">(Optional)</span></label>
            <input class="p-2 rounded-md outline-none mb-4 text-neutral-300 bg-neutral-700" type="file" name="photo" id="photo">

            <button class="bg-green-500 rounded p-2 uppercase text-white font-semibold" type="submit">Create
                Task</button>
        </form>
    </div>
</body>

</html>