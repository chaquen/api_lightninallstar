<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cobro;

use App\DetalleCobro;

use App\DetalleAbonos;

use App\Util;

use Maatwebsite\Excel\Facades\Excel;


class DetalleEstudianteCobroController extends Controller
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
                //var_dump($id);
                $dt=DetalleCobro::join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                        ->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                        ->join("users","users.id","=","deportistas.fk_id_usuario")
                        ->join("grupos","grupos.id","=","deportistas.fk_id_grupo")
                        ->where("deportistas.documento_identidad",$id)
                        ->select("deportistas.id",
                                 "deportistas.nombres",
                                 "deportistas.apellidos",
                                 "deportistas.documento_identidad",
                                 "cobros.nombre_cobro",
                                 "detalle_cobros.id as id_cuenta_cobro",
                                 "detalle_cobros.numero_cuotas",
                                 "detalle_cobros.total_a_pagar",
                                 "detalle_cobros.pago_hasta_la_fecha",
                                 "detalle_cobros.saldo_pendiente",
                                 "detalle_cobros.saldo_a_favor",
                                 "detalle_cobros.desde",
                                 "detalle_cobros.hasta",
                                  "grupos.nombre_grupo"
                                  )
                        ->get();

                 if(count($dt)>0){
                    return response()->json(["mensaje"=>"Deportista encontrado" ,"respuesta"=>true,"datos"=>$dt]);      
                 }else{
                    return response()->json(["mensaje"=>"Deportista NO tiene registrado ningun tipo de pagpo pendiente" ,"respuesta"=>false]);    
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
        $sal=DetalleCobro::where("id",$id)->get();

        DetalleCobro::where("id",$id)->decrement("saldo_pendiente",$datos["datos"]->saldo_a_abonar);
        DetalleCobro::where("id",$id)->increment("pago_hasta_la_fecha",$datos["datos"]->saldo_a_abonar);
        
        $sal2=DetalleCobro::where("id",$id)->get();
        
        DetalleAbonos::insert(["fk_id_detalle_cobro"=>$id,"fk_id_deportista"=>$datos["datos"]->id_deportista,"fk_id_usuario_registro_pago"=>$datos["datos"]->usuario,"saldo_anterior"=>$sal[0]->saldo_pendiente,"valor_abonado"=>$datos["datos"]->saldo_a_abonar,"nuevo_saldo"=>$sal2[0]->saldo_pendiente,"created_at"=>$datos["hora_cliente"],"updated_at"=>$datos["hora_cliente"],"fecha_abono"=>$datos["hora_cliente"]]);

        return response()->json(["mensaje"=>"SALDO ACTUALIZADO" ,"respuesta"=>true]);
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

    public function detalle_cobro_todos($id_grupo){
         $dt=DetalleCobro::join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                        ->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                        ->join("users","users.id","=","deportistas.fk_id_usuario")
                        ->join("grupos","grupos.id","=","deportistas.fk_id_grupo")
                        ->where("deportistas.fk_id_grupo",$id_grupo)
                        ->select("deportistas.id",
                                 "deportistas.nombres",
                                 "deportistas.apellidos",
                                 "deportistas.documento_identidad",
                                 "cobros.nombre_cobro",
                                 "detalle_cobros.id as id_cuenta_cobro",
                                 "detalle_cobros.numero_cuotas",
                                 "detalle_cobros.total_a_pagar",
                                 "detalle_cobros.pago_hasta_la_fecha",
                                 "detalle_cobros.saldo_pendiente",
                                 "detalle_cobros.saldo_a_favor",
                                 "detalle_cobros.desde",
                                 "detalle_cobros.hasta",
                                 "grupos.nombre_grupo"
                                  )
                        ->get();
                 return response()->json(["mensaje"=>"Deportista encontrado" ,"respuesta"=>true,"datos"=>$dt]);
    }

    public function exportar_reporte_saldos($id_grupo,$id_depor){
        if($id_depor=="0"){
             $dt=DetalleCobro::join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                        ->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                        ->join("users","users.id","=","deportistas.fk_id_usuario")
                        ->join("grupos","grupos.id","=","deportistas.fk_id_grupo")
                        ->where("deportistas.fk_id_grupo",$id_grupo)
                        ->select("deportistas.id",
                                 "deportistas.nombres",
                                 "deportistas.apellidos",
                                 "deportistas.documento_identidad",
                                 "cobros.nombre_cobro",
                                 "detalle_cobros.id as id_cuenta_cobro",
                                 "detalle_cobros.numero_cuotas",
                                 "detalle_cobros.total_a_pagar",
                                 "detalle_cobros.pago_hasta_la_fecha",
                                 "detalle_cobros.saldo_pendiente",
                                 "detalle_cobros.saldo_a_favor",
                                 "detalle_cobros.desde",
                                 "detalle_cobros.hasta",
                                 "grupos.nombre_grupo"
                                  )
                        ->get();
        }else{
             $dt=DetalleCobro::join("cobros","cobros.id","=","detalle_cobros.fk_id_cobro")
                        ->join("deportistas","deportistas.id","=","detalle_cobros.fk_id_deportista")
                        ->join("users","users.id","=","deportistas.fk_id_usuario")
                        ->join("grupos","grupos.id","=","deportistas.fk_id_grupo")
                        ->where([["deportistas.documento_identidad",$id_depor],["deportistas.fk_id_grupo",$id_grupo]])

                        ->select("deportistas.id",
                                 "deportistas.nombres",
                                 "deportistas.apellidos",
                                 "deportistas.documento_identidad",
                                 "cobros.nombre_cobro",
                                 "detalle_cobros.id as id_cuenta_cobro",
                                 "detalle_cobros.numero_cuotas",
                                 "detalle_cobros.total_a_pagar",
                                 "detalle_cobros.pago_hasta_la_fecha",
                                 "detalle_cobros.saldo_pendiente",
                                 "detalle_cobros.saldo_a_favor",
                                 "detalle_cobros.desde",
                                 "detalle_cobros.hasta",
                                  "grupos.nombre_grupo"
                                  )
                        ->get();
        }

        $arr=[];
        $i=0;
        foreach ($dt as $key => $value) {
            //var_dump($value);
          $arr[$i]["id"]=$value->id;
          $arr[$i]["nombres"]=$value->nombres;
          $arr[$i]["apellidos"]=$value->apellidos;
          $arr[$i]["documento_identidad"]=$value->documento_identidad;
          $arr[$i]["nombre_cobro"]=$value->nombre_cobro;
          $arr[$i]["total_a_pagar"]=$value->total_a_pagar;
          $arr[$i]["pago_hasta_la_fecha"]=$value->pago_hasta_la_fecha;
          $arr[$i]["saldo_pendiente"]=$value->saldo_pendiente;
          $arr[$i]["saldo_a_favor"]=$value->saldo_a_favor;
          $arr[$i]["desde"]=$value->desde;
          $arr[$i]["hasta"]=$value->hasta;
          $arr[$i]["nombre_grupo"]=$value->nombre_grupo;
          $i++;
          
        }
            
        Excel::create("saldo", function($excel) use($arr){
                         // use($datos->datos->nombre_reporte)   
             $excel->sheet('saldo',function($sheet) use($arr){
                //var_dump($arr);
                    $sheet->fromArray($arr);
             });
        })->store('xls', trim(substr(base_path(),0,-4)."archivos\ ")."exportacion");
        if(count($dt)>0){
             return response()->json(["mensaje"=>"Datos encontrados ","respuesta"=>true,"archivo"=>"saldo.xls"]);   
        }else{
             return response()->json(["mensaje"=>"Datos NO encontrados","respuesta"=>false]);
        } 
    }
}
