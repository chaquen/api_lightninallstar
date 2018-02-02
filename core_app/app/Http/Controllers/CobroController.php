<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cobro;

use App\Util;
class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=Cobro::get();
        if(count($c)>0){
            return response()->json(["mensaje"=>"Cobro encontrado" ,"respuesta"=>true,"datos"=>$c]);        
        }else{
            return response()->json(["mensaje"=>"Cobro no encontrado" ,"respuesta"=>false]);  
        }
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
        $datos=Util::decodificar_json($request->get("datos"));
        
        $c=Cobro::where("nombre_cobro",$datos["datos"]->nombre_cobro)->get();
        if(count($c)==0){
            $arr=(array)$datos["datos"];

            Cobro::create($arr);
             return response()->json(["mensaje"=>"Cobro registrado" ,"respuesta"=>true]);    
        }else{
            return response()->json(["mensaje"=>$datos["datos"]->nombre_cobro.", este cobro ya esta registrado" ,"respuesta"=>false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $c=Cobro::where("id","=",$id."%")->get();
        if(count($c)>0){
            return response()->json(["mensaje"=>"Cobro encontrado" ,"respuesta"=>true,"datos"=>$c]);        
        }else{
            return response()->json(["mensaje"=>"Cobro no encontrado" ,"respuesta"=>false]);  
        }
        
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
        Cobro::where("id","=",$id)->update(["tipo_cobro"=>$datos["datos"]->tipo_cobro,"nombre_cobro"=>$datos["datos"]->nuevo_nom_cobro]);
         return response()->json(["mensaje"=>"Cobro editado" ,"respuesta"=>true]);        

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
        Cobro::where("id","=",$id)->delete();
         return response()->json(["mensaje"=>"Cobro eliminado" ,"respuesta"=>true]);                
    }
}
