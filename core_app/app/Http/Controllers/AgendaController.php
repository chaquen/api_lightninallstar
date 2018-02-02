<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Agenda;

use App\Util;

class AgendaController extends Controller
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
        //
        //
        $datos=Util::decodificar_json($request->get("datos"));
        
        $arr=(array)$datos["datos"];
        //var_dump($arr);
        Agenda::create($arr);
        return response()->json(["mensaje"=>"Evento agendado" ,"respuesta"=>true]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $id=explode("&",$id);
        $ag=Agenda::where($id[0],"=",$id[1])->get();
        return response()->json(["mensaje"=>"Evento consultado" ,"datos"=>$ag,"respuesta"=>true]);    
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
          $datos=Util::decodificar_json($request->get("datos"));
          $arr=(array)$datos["datos"];
          $ag=Agenda::where("id","=",$id)->update($arr);
          return response()->json(["mensaje"=>"Evento consultado" ,"respuesta"=>true]);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
