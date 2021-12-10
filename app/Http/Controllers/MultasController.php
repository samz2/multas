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
        $client = new Client([ 
            'headers' => [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            ]]);
        
        $res = $client->get('https://my356414.sapbydesign.com/sap/byd/odata/ana_businessanalytics_analytics.svc/RPZ72C3D9354FB5B1D329064EQueryResults?$select=CBP_UUID,TBP_UUID,CFRMTD_PSTL_ADDR,CCOUNTRY_CODE,TCOUNTRY_CODE,TRSP_EMPL_UUID,CNIELSEN_RGNCODE,TNIELSEN_RGNCODE,CPHONE_NR,CTAX_ID_NR',
        [
            'auth' => [
                'ccfuncional', 
                'Inicio02'
            ]
        ]
        );
        $val  = $res->getBody()->getContents();
        $text = simplexml_load_string($val);
        $json = json_encode($text);
        $array = json_decode($json,TRUE);
        dd($val );
        // dd(str_replace("%20"," ",$array["entry"][0]["link"]["@attributes"]["href"]));
        return compact("text");
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
        $multas =  Multas::select("multas.falta AS code",\DB::RAW("concat_ws(' ',multas.Falta,multas.Infraccion) as 'label'"))
                    ->get();
        return compact("multas");
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
