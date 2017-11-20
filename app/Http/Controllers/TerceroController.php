<?php

namespace Mascotas\Http\Controllers;

use Mascotas\Tercero;
use Illuminate\Http\Request;

class TerceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terceros = Tercero::Paginate(8);
        //dd($users);
        return view('tercero.index', compact('terceros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mascotas\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function show(Tercero $tercero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mascotas\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function edit(Tercero $tercero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mascotas\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tercero $tercero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mascotas\Tercero  $tercero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tercero $tercero)
    {
        //
    }
}
