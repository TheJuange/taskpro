<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View("index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("task.create");
    }


    public function SaveImage(UploadedFile $imagen, $carpeta = 'Image')
    {
        if ($imagen->isValid()) {
            $ruta = $imagen->store($carpeta, 'public');
            return Storage::url($ruta);
        }

        return null; // Ret
    }
    /**
     * Store a newly created resource in storage.
     * StoreTaskRequest
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                "title" => "required|string|min:3",
                "due_date" => "required|date",
                "priority" => "string|min:3|max:6",
                "description" => "required|string|min:3",
                "photo" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
            ]

        );

        if ($request->hasFile('photo')) {
            $imagen = $request->file('photo');
            $pathImage = $this->SaveImage($imagen);
        } else {
            $notImage = "storage/public/default/notImage.png";
            $pathImage =  $notImage;
        }


        //  dd($pathImage);
        $task = new Task();
        $task->title = $validateData['title'];
        $task->due_date = $validateData['due_date'];
        $task->priority = $validateData['priority'];
        $task->description = $validateData['description'];
        $task->photo = $pathImage;
        $task->completed = false;
        $task->save();
        return redirect()->back()->with('success', '¡Registro exitoso!');
    }


    public function getTaskList()
    {
        return view('task.show', ['tasks' => Task::all()]);
    }


    public function show(Request $request)
    {
        $tasks = Task::where('title', 'like', '%' . $request->search . '%') 
        ->orWhere('description', 'like', '%' . $request->search  . '%') 
        ->get();
        
        return view('task.show', ['tasks' => $tasks]);
    }

    public function show_id(Task $id)
    {
        $task = Task::find($id);
        return view('task.detail', ['task' => $task]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        //dd($tasks);
        return view('task.edit', ['tasks' => $tasks]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
