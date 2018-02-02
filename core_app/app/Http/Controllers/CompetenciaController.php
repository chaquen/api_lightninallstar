<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Competencia;

use App\Util;

use DB;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $com=Competencia::get();

        return response()->json(["mensaje"=>"Competencias","datos"=>$com,"respuesta"=>true]);
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
        
         $datos=Util::decodificar_json($request->get("datos"));
        
           
        $arr=(array)$datos["datos"];

        Competencia::create($arr);
        return response()->json(["mensaje"=>"Competencia registrada" ,"respuesta"=>true]);    
            
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
        $com=Competencia::where("id",$id)->get();

        return response()->json(["mensaje"=>"Competencias","datos"=>$com,"respuesta"=>true]);
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

        Competencia::where("id",$id)->update($arr);
        return response()->json(["mensaje"=>"Competencia actualizada" ,"respuesta"=>true]);    
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

    public function crear_video(Request $request){
        $dd=json_decode($request->get("datos"));
        
        $d=DB::table("videos")->insert((array)$dd->datos);
        echo json_encode(["mensaje"=>"VIDEO CREADO","respuesta"=>true]);
    }

    public function crear_comentario(Request $request){
        $dd=json_decode($request->get("datos"));
        
        $d=DB::table("comentarios")->insert((array)$dd->datos);
        echo json_encode(["mensaje"=>"COMENTARIOS REGISTRADO","respuesta"=>true]);
    }
}
