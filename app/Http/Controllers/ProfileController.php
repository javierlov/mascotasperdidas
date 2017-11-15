<?php

namespace App\Http\Controllers;

use App\User;
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
        $users = User::Paginate(8);
        //dd($users);
        return view('profile.index', compact('users'));
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
        $this->validate($request,['name'=>'required|string', 'email'=>'required|string']);
                
        //2) instanciar modelo
        $users = new users;
        $users->name = $request->name;
        $users->email = $request->description;
        $users->save();
        
        //3) redireccionar
        return "se guardo el usuario";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile.show', compact('users'));//pasamos variable $task
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('profile.edit',compact('users'));
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
        $this->validate($request,['name'=>'required|string', 'email'=>'required|string']);
                
        //2) instanciar modelo       
        $users->name = $request->name;
        $users->email = $request->email;

        $users->save();
        
        //3) redireccionar
        //$this->index();
        $users = users::paginate(10);
        return view('profile.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'hi destroy users';
    }
}
