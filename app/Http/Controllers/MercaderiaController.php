<?php

namespace App\Http\Controllers;

use App\Mercaderia;
use Auth;
use Illuminate\Http\Request;

class MercaderiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //dd($request);
        $mercaderias = Mercaderia::Paginate(8);
        return view('mercaderia.index', compact('mercaderias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mercaderia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['codigo' => 'required|string', 'tipo' => 'required|string', 'estado' => 'required']);

        //2) instanciar modelo
        $mercaderia = new Mercaderia;
        
        $mercaderia->codigo = $request->codigo;
        $mercaderia->tipo = $request->tipo;
        $mercaderia->tercero_id = $request->tercero_id;
        $mercaderia->estado = $request->estado;
        $mercaderia->amount = $request->amount;
        $mercaderia->user_id = Auth::user()->id; //usuario logeado
        
        $mercaderia->save();

        //3) redireccionar
        return $this->index($this->valnull);
        //return "se guardo la tarea";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mercaderia  $mercaderia
     * @return \Illuminate\Http\Response
     */
    public function show(Mercaderia $mercaderia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mercaderia  $mercaderia
     * @return \Illuminate\Http\Response
     */
    public function edit(Mercaderia $mercaderia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mercaderia  $mercaderia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mercaderia $mercaderia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mercaderia  $mercaderia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mercaderia $mercaderia)
    {
        //
    }
}
