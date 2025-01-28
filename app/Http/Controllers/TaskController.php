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


    public function SaveImage(UploadedFile $imagen , $carpeta = 'Image')
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
        $validateData = $request->validate([
            "name" => "required|string|min:3",
            "due_date" => "required|date",
            "priority" => "string|min:3|max:6",
            "description" => "required|string|min:3",
            "photo" => "image"
        ],
        [
            "name.required" => "El campo titulo es requerido",
            "name.string" => "El campo titulo debe ser un texto",
            "name.min" => "El campo titulo debe tener al menos 3 caracteres",
            "due_date.required" => "El campo fecha es requerido",
            "due_date.date" => "El campo fecha debe ser una fecha",
            "priority.string" => "El campo prioridad debe ser un texto",
            "priority.min" => "El campo prioridad debe tener al menos 3 caracteres",
            "priority.max" => "El campo prioridad debe tener como maximo 6 caracteres",
            "description.required" => "El campo descripcion es requerido",
            "description.string" => "El campo descripcion debe ser un texto",
            "description.min" => "El campo descripcion debe tener al menos 3 caracteres",
            "photo.image" => "El campo foto debe ser una imagen"
        ]
    
    );

        $imagen = $request->file('photo');
        $pathImage = $this->SaveImage($imagen);

        dd($pathImage);
       /* $task = new Task();
        $task->name = $request->name;
        $task->due_date = $request->due_date;
        $task->priority = $request->priority;
        $task->description = $request->description;
        $task->image = $pathImage;
        $task->completed = false;
        $task->save();*/
        return redirect()->route('create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
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
