<?php

namespace App\Http\Controllers;

use App\multas;
use App\registro_multas;
use Barryvdh\DomPDF\Facade as PDF;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multas = Multas::all();

        return compact("multas");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\multas  $multas
     * @return \Illuminate\Http\Response
     */
    public function show(multas $multas)
    {
        $multas =  Multas::select("multas.Falta AS code",\DB::RAW("concat_ws(' ',multas.Falta,multas.Infraccion) as 'label'"))
                    ->get();
        return compact("multas");
        $year = date("Y");
        
    }

    public function multas($fechai,$fechaf)
    {
        $multas =  registro_multas::join("persona as p","registro_multas.DNI","p.Documento")
                   ->join("multas AS m","registro_multas.Multa","m.Falta")
                   ->select("p.Documento",\DB::raw("concat(p.Nombre,p.Apellidos) as Nombre"),"registro_multas.Fecha","registro_multas.Modelo","registro_multas.Placa","registro_multas.Multa","m.Monto","m.Descuento")
                   ->where("registro_multas.Fecha",">=",$fechai)
                   ->where("registro_multas.Fecha","<=",$fechaf)
                   ->get();
        return compact("multas");
    }
    
    public function reporte($fechai,$fechaf)
    {
        $multas =  registro_multas::join("persona as p","registro_multas.DNI","p.Documento")
                   ->join("multas AS m","registro_multas.Multa","m.Falta")
                   ->select("p.Documento",\DB::raw("concat(p.Nombre,p.Apellidos) as Nombre"),"registro_multas.Fecha","registro_multas.Modelo","registro_multas.Placa","registro_multas.Multa","m.Monto","m.Descuento")
                   ->where("registro_multas.Fecha",">=",$fechai)
                   ->where("registro_multas.Fecha","<=",$fechaf)
                   ->get();
        $pdf = PDF::loadView('multas',compact("multas"));
        return $pdf->stream('multas.pdf');
                   
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\multas  $multas
     * @return \Illuminate\Http\Response
     */
    public function edit(multas $multas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\multas  $multas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, multas $multas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\multas  $multas
     * @return \Illuminate\Http\Response
     */
    public function destroy(multas $multas)
    {
        //
    }
}
