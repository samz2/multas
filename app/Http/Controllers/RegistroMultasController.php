<?php

namespace App\Http\Controllers;

use App\registro_multas;
use App\persona;
use Illuminate\Http\Request;

class RegistroMultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $hoy = date("Y-m-d");
        $find = Persona::Where("Documento",$request->registro["dni"])->first();
        if(!isset($find))
        {
            $persona = new Persona();
            $persona->Documento         = $request->registro["dni"];
            $persona->Tipo_Documento    = "DNI";
            $persona->Nombre            = $request->persona["nombre"];
            $persona->Apellidos         = $request->persona["apellidos"];
            $persona->Direccion         = $request->persona["direccion"];
            $persona->Fecha_Nac         = $request->persona["fechaNac"];
            $persona->save();
        }
        
        $registro = new registro_multas();
        $registro->DNI           = $request->registro["dni"];
        $registro->Placa         = $request->registro["placa"];
        $registro->Fabricacion   = $request->registro["fabricacion"];
        $registro->Modelo        = $request->registro["modelo"];
        $registro->Multa         = $request->registro["multa"];
        $registro->Fecha         = $hoy;
        $registro->created_at    = $hoy;
        $registro->save();
        $msg    = "Multa registrada correctamente";
        $type   = "success";
        return compact("msg","type");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\registro_multas  $registro_multas
     * @return \Illuminate\Http\Response
     */
    public function show(registro_multas $registro_multas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\registro_multas  $registro_multas
     * @return \Illuminate\Http\Response
     */
    public function edit(registro_multas $registro_multas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\registro_multas  $registro_multas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registro_multas $registro_multas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\registro_multas  $registro_multas
     * @return \Illuminate\Http\Response
     */
    public function destroy(registro_multas $registro_multas)
    {
        //
    }
}
