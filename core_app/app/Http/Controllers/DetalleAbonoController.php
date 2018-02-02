<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DetalleAbonos;

use Maatwebsite\Excel\Facades\Excel;

class DetalleAbonoController extends Controller
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
        
        $d =explode("&",$id);
        //var_dump($d);
        if($d[1]!="0"){
            $da=DetalleAbonos::join("detalle_cobros","detalle_cobros.id","=","detalle_abonos.fk_id_detalle_cobro")
                    //->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                    ->join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                    ->where([["detalle_cobros.fk_id_deportista",$d[0]],["detalle_abonos.fk_id_detalle_cobro",$d
                        [1]]])
                    ->orderby("detalle_abonos.fecha_abono","DESC")
                    ->get();
        }else{
            $da=DetalleAbonos::join("detalle_cobros","detalle_cobros.id","=","detalle_abonos.fk_id_detalle_cobro")
                    //->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                    ->join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                    ->where("detalle_cobros.fk_id_deportista",$d[0])
                    ->orderby("detalle_abonos.fecha_abono","DESC")
                    ->get();
        }

        if(count($da)>0){
            return response()->json(["mensaje"=>"Abonos encontrados","respuesta"=>true,"datos"=>$da]);
        }else{
            return response()->json(["mensaje"=>"Abonos NO encontrados","respuesta"=>false]);
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

    public function exportar_detalle_abonos($id_depor,$id_cobro){
        
        //var_dump($d);
        if($id_cobro!="0"){
            $da=DetalleAbonos::join("detalle_cobros","detalle_cobros.id","=","detalle_abonos.fk_id_detalle_cobro")
                    //->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                    ->join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                    ->where([
                        ["detalle_cobros.fk_id_deportista",$id_depor],
                        ["detalle_abonos.fk_id_detalle_cobro",$id_cobro]
                        ])
                    ->orderby("detalle_abonos.fecha_abono","DESC")
                    ->get();
        }else{
            $da=DetalleAbonos::join("detalle_cobros","detalle_cobros.id","=","detalle_abonos.fk_id_detalle_cobro")
                    //->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                    ->join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                    ->where("detalle_cobros.fk_id_deportista",$id_depor)
                    ->orderby("detalle_abonos.fecha_abono","DESC")
                    ->get();
        }

        $arr=[];
        $i=0;
        foreach ($da as $key => $value) {
                   
          $arr[$i]["Descripcion pago"]=$value->nombre_cobro;
          $arr[$i]["Total"]=$value->total_a_pagar;
          $arr[$i]["Valor abonado"]=$value->valor_abonado;
          $arr[$i]["Saldo pendiente"]=$value->nuevo_saldo;
          $arr[$i]["total_a_pagar"]=$value->total_a_pagar;
          $arr[$i]["Fecha saldo"]=$value->fecha_abono;          
          $i++;
          
        }
            
        Excel::create("detalle_abonos", function($excel) use($arr){
                         // use($datos->datos->nombre_reporte)   
             $excel->sheet('detalle_abonos',function($sheet) use($arr){
                //var_dump($arr);
                    $sheet->fromArray($arr);
             });
        })->store('xls', trim(substr(base_path(),0,-4)."archivos\ ")."exportacion");
        
        if(count($da)>0){
             return response()->json(["mensaje"=>"Datos encontrados ","respuesta"=>true,"archivo"=>"detalle_abonos.xls"]);   
        }else{
             return response()->json(["mensaje"=>"Datos NO encontrados","respuesta"=>false]);
        } 
    }
}
