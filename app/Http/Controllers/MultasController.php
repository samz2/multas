<?php

namespace App\Http\Controllers;

use App\multas;
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
