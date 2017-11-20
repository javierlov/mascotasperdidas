<?php

namespace Mascotas\Http\Controllers;

use Mascotas\Task;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller {

    /**
     * https://www.youtube.com/watch?v=WyKgd1sX6S4&list=PLS3ZgoVufwTkqmF0oAnfeus9ZklMqjFhS&index=28
     * https://www.youtube.com/watch?v=2FRHOe2JUwI&list=PLS3ZgoVufwTkqmF0oAnfeus9ZklMqjFhS&index=30
     * https://www.youtube.com/watch?v=w_6gHm8LkGM
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $paginas = 5;
    private $valnull = 'N';

    public function __consturct(){
        $this->middleware('auth');
        $this->middleware('checkage');
    }

    public function index(Request $request) {

         //dd($request);
        $user_id = Auth::user()->id; 
        //$tasks = Task::paginate($this->paginas);
        
        //recupera el modelo y retorna todas las tareas
        $tasks = Task::SearchUserId($request, 11)->paginate($this->paginas);
        
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //retorna la vista para crear una tarea
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //dd($request->description);
        //almacena datos en la base
        //1) validacion de datos
        $this->validate($request, ['name' => 'required|string|min:10|max:20', 
                                'description' => 'required|string|max:200']);

        //2) instanciar modelo
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_ir = Auth::user()->id; //usuario logeado
        $task->save();

        //3) redireccionar
        return $this->index($request);
        //return "se guardo la tarea";
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mascotas\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task) {
        //retorna una vista de la tarea solicitada
        //dd($task);
        return view('task.show', compact('task')); //pasamos variable $task
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mascotas\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) {
        //dd($task);
        //edita una tarea
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mascotas\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task) {
        //aca actualiza realmente los datos
        //dd($request);
        //1) validacion de datos
        $this->validate($request, ['name' => 'required|string', 'description' => 'required|string']);

        //2) instanciar modelo       
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_ir = Auth::user()->id; //usuario logeado
        $task->save();

        //3) redireccionar
        return $this->index($request);
        //$tasks = Task::paginate($this->paginas);
        //return view('task.index', compact('tasks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mascotas\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) {
        //
    }

}
