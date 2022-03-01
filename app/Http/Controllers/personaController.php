<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\persona;
use App\User;

class personaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::select("*",\DB::raw("YEAR(CURDATE())-YEAR(`Fecha_Nac`) + 
        IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(`Fecha_Nac`,'%m-%d'), 0 , -1 ) as 'Edad'"))->get();
        return compact("personas");
    }

    public function ver()
    {
        $user = \Auth::user()->user;
        $persona = Persona::where("Documento",$user)->first();
        return compact("persona");
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
        $find = Persona::Where("Documento",$request->persona["dni"])->first();
        if(isset($find))
        {
            $msg    = "Persona ya existe";
            $type   = "warning";
        }else{
            $hoy = date("Y-m-d");
            // dd($request->persona["dni"]);
            $persona = new Persona();
            $persona->Documento         = $request->persona["dni"];
            $persona->Tipo_Documento    = $request->persona["Tipo"];
            $persona->Nombre            = $request->persona["nombre"];
            $persona->Apellidos         = $request->persona["apellidos"];
            $persona->Direccion         = $request->persona["direccion"];
            $persona->Fecha_Nac         = $request->persona["fechaNac"];
            $user = new User();
            $user->user                 = $request->persona["dni"];
            $user->password             = bcrypt($request->persona["dni"]);
            $user->tipo                 = 2;
            $persona->save();
            $user->save();
            $msg    = "Persona registrada correctamente";
            $type   = "success";
        }
        return compact("msg","type");
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $dni
     * Consultas a RENIEC
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        $persona = Persona::where("Documento",$dni)->delete();
        return "bien";
    }
}
