<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Producto;

use App\Util;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $p=Producto::get();
        if(count($p)>0){
            return response()->json(["respuesta"=>true,"mensaje"=>"Productos encontrados","datos"=>$p]);
        }else{
            return response()->json(["respuesta"=>false,"mensaje"=>"Productos NO encontrados"]);
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
        
        $c=Producto::where("codigo_producto",$datos["datos"]->codigo_producto)->get();
        if(count($c)==0){
             $arr=(array)$datos["datos"];

             Producto::create($arr);

             return response()->json(["mensaje"=>"Producto registrado" ,"respuesta"=>true]);        
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
        $p=Producto::where("id",$id)->get();
        if(count($p)>0){
            return response()->json(["respuesta"=>true,"mensaje"=>"Productos encontrados","datos"=>$p]);
        }else{
            return response()->json(["respuesta"=>false,"mensaje"=>"Productos NO encontrados"]);
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
         $datos=Util::decodificar_json($request->get("datos"));
        
       
       
             $arr=(array)$datos["datos"];

             Producto::where("id",$id)->update($arr);

             return response()->json(["mensaje"=>"Producto editado" ,"respuesta"=>true]);        
        
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

    public function subir_img_pro(Request $request){
        $datos=json_decode($request->get("datos"));
       //var_dump($datos);
        $des=substr(base_path(),0,-8)."archivos/productos";        
        $file=$request->file('miArchivo');
        
        if($file->move($des,$datos->datos->nombre_archivo)){
            return response()->json(["mensaje"=>"ARCHIVO GUARDADO","respuesta"=>true,"ruta"=>trim("archivos\productos\ ").$datos->datos->nombre_archivo]);
        }else{
            return response()->json(["mensaje"=>"No se a podido subir el archivo","respuesta"=>true]);
        }
    }
}
