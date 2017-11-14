<?php

namespace App\Http\Controllers;

use App\Task;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * https://www.youtube.com/watch?v=xIC4uNR8yqg&index=13&list=PLS3ZgoVufwTkqmF0oAnfeus9ZklMqjFhS
     * https://www.youtube.com/watch?v=C8OY5weHWqE&list=PLS3ZgoVufwTkqmF0oAnfeus9ZklMqjFhS&index=18
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('DESCRIPTION', 'LIKE', '%t%')->simplePaginate(5);
        // dd($tasks);
        return view('profile.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1) validacion de datos
        $this->validate($request,['name'=>'required|string', 'description'=>'required|string']);
                
        //2) instanciar modelo
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_ir = Auth::user()->id;//usuario logeado
        $task->save();
        
        //3) redireccionar
        return "se guardo la tarea";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile.show', compact('task'));//pasamos variable $task
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('profile.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //1) validacion de datos
        $this->validate($request,['name'=>'required|string', 'description'=>'required|string']);
                
        //2) instanciar modelo       
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_ir = Auth::user()->id;//usuario logeado
        $task->save();
        
        //3) redireccionar
        //$this->index();
        $tasks = Task::paginate(10);
        return view('task.index', compact('tasks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'hi destroy';
    }
}
