<?php

namespace App\Http\Controllers;

use App\tarjetas;
use Illuminate\Http\Request;

class TarjetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarjetas = Tarjetas::all();
        return compact("tarjetas");
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
        $msg = "";
        $type = "";
        $find = Tarjetas::Where("placa",$request->tarjeta["placa"])->first();
        if(isset($find))
        {
            $msg    = "Tarjeta de circulación ya existe";
            $type   = "warning";
        }else{
            $hoy = date("Y-m-d");
            // dd($request->tarjeta["dni"]);
            $tarjeta = new tarjetas();
            $tarjeta->tipo      = $request->tarjeta["tipo"];
            $tarjeta->placa     = $request->tarjeta["placa"];
            $tarjeta->motor     = $request->tarjeta["motor"];
            $tarjeta->serie     = $request->tarjeta["serie"];
            $tarjeta->color     = $request->tarjeta["color"];
            $tarjeta->year      = $request->tarjeta["year"];
            $tarjeta->empresa   = $request->tarjeta["empresa"];
            $tarjeta->afiliado  = $request->tarjeta["afiliado"];
            
            $tarjeta->save();
            $msg    = "Tarjeta de circulación registrada correctamente";
            $type   = "success";
        }
        return compact("msg","type");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tarjetas  $tarjetas
     * @return \Illuminate\Http\Response
     */
    public function show(tarjetas $tarjetas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tarjetas  $tarjetas
     * @return \Illuminate\Http\Response
     */
    public function edit(tarjetas $tarjetas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tarjetas  $tarjetas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tarjetas $tarjetas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tarjetas  $tarjetas
     * @return \Illuminate\Http\Response
     */
    public function destroy($placa)
    {
        $tarjetas = tarjetas::where("placa",$placa)->delete();
        return "bien";
    }
}
