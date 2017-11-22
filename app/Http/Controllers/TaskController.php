<?php

namespace Mascotas\Http\Controllers;

use Mascotas\Task;
use Auth;
use Illuminate\Http\Request;
use Session;
use DateTime;
use Carbon\Carbon;
//use Laracasts\Flash\Flash;

class TaskController extends Controller {

    /**
      https://www.youtube.com/watch?v=WyKgd1sX6S4&list=PLS3ZgoVufwTkqmF0oAnfeus9ZklMqjFhS&index=28
      https://www.youtube.com/watch?v=2FRHOe2JUwI&list=PLS3ZgoVufwTkqmF0oAnfeus9ZklMqjFhS&index=30
      https://www.youtube.com/watch?v=w_6gHm8LkGM
     *********************
     https://www.youtube.com/watch?time_continue=7&v=rEu3m8R3JjE

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

 return view('layouts.captcha');

        $user_id = Auth::user()->id; 
        // dd($request);
        // $tareas = Task::paginate($this->paginas);
        
        // recupera el modelo y retorna todas las tareas
        $tasks = Task::SearchUserId($request, $user_id)->paginate($this->paginas);
        
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
        $task->user_id = Auth::user()->id; //usuario logeado
        $task->save();

        Session::flash('message','se ha insertado correctamente. Tarea : '.$task->id);
        // flash("se ha guardado correctamente ");
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
        $task->user_id = Auth::user()->id; //usuario logeado

        $hoy = Carbon::now()->toDateTimeString();
        $task->updated_at = $hoy;  
        
        $task->save();

        Session::flash('message','se ha actualizado correctamente. Tarea : '.$task->id.' fecha '.$hoy);
        //3) redireccionar
        return redirect('task');
        //return $this->index($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mascotas\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // dd($task);
        // delete
        $task = Task::find($id);
        $task->delete();

        // redirect
        Session::flash('message','se ha eliminado correctamente. Tarea : '.$id);
        //flash("se ha eliminado correctamente ");

        return redirect('task');
    }

}
