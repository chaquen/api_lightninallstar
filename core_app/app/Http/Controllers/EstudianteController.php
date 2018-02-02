<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Deportista;

use App\Util;

use App\User;


class EstudianteController extends Controller
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
        $datos=Util::decodificar_json($request->get("datos"));
        //var_dump($datos["datos"]->datos);
        //var_dump($datos["datos"]->datos2->email);
        $su=User::where("email",$datos["datos"]->datos2->email)->get();
       
        if(count($su)==0){
            $u=User::firstOrCreate(["email"=>$datos["datos"]->datos2->email,"password"=>$datos["datos"]->datos2->password,"rol"=>"deportista"]);
            
            $arr=(array)$datos["datos"]->datos;

            $arr["fk_id_usuario"]=$u->id;
            $dd=Deportista::where("documento_identidad","=",$datos["datos"]->datos->documento_identidad)->get();
            if(count($dd)==0){
                Deportista::firstOrCreate($arr);    
                return response()->json(["mensaje"=>"Deportista registrado" ,"respuesta"=>true]);    
            }else{
                return response()->json(["mensaje"=>$datos["datos"]->datos->documento_identidad.", este documento ya esta registrado" ,"respuesta"=>false]);
            }
            
        }else{
            return response()->json(["mensaje"=>$datos["datos"]->datos2->email.", este correo ya esta registrado" ,"respuesta"=>false]);
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
        //
        $id=explode("=", $id);
            //echo count($id);
        if(count($id)==2){
                if($id[0]=="nombres"){
                    $id[1].="%";
                }
                //var_dump($id[1]);
                $us=Deportista::join("users","users.id","=","deportistas.fk_id_usuario")
                            ->where("deportistas.".$id[0],"LIKE",$id[1])
                            ->get();
                if(count($us)>0){
                    if($id[0]=="documento_identidad"){
                        return response()->json(["mensaje"=>"Usuario encontrado" ,"respuesta"=>true,"datos"=>$us[0]]);    
                    }
                    return response()->json(["mensaje"=>"Usuario encontrado" ,"respuesta"=>true,"datos"=>$us]);    
                }          
                return response()->json(["mensaje"=>"Usuario NO encontrado" ,"respuesta"=>false]);  
        }else{
                return response()->json(["mensaje"=>"Los parametros de la consulta no sos correctos [=> ".json_encode($id)." <=]" ,"respuesta"=>false]);  
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
        //var_dump($datos["datos"]->datos);
        //var_dump($datos["datos"]->datos2->email);
        $su=User::where("id",$id)->update($datos);
        return response()->json(["mensaje"=>"Deportista editado" ,"respuesta"=>true]);
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
        $id_u=Deportista::where("documento_identidad",$id)->get();
        //var_dump($id_u[0]->fk_id_usuario);
        User::where("id",$id_u[0]->fk_id_usuario)->delete();
        

        return response()->json(["mensaje"=>"Deportista eliminado" ,"respuesta"=>true]);
    }

    public function subir_img_perfil(Request $request){
            
            $datos=json_decode($request->get("datos")); 
            
            $des="archivos/perfiles/deportistas/".$datos->datos->cedula;
            $file=$request->file('miArchivo');
            $filename=$file->getClientOriginalName();
            //var_dump($filename);

            if($file->move($des,$filename)){
                echo json_encode(["respuesta"=>true,"mensaje"=>"movido"]);
            }else{
                echo json_encode(["respuesta"=>false,"mensaje"=>"error al mover archivo"]);
            }
    }

    public function deportistas_por_grupo($id_grupo){
        $depo=Deportista::where("fk_id_grupo",$id_grupo)->get();

        if(count($depo)>=1){
            return response()->json(["mensaje"=>"Deportistas encontrados" ,"respuesta"=>true,"datos"=>$depo]);
        }else{
            return response()->json(["mensaje"=>"Deportistas NO encontrados" ,"respuesta"=>false]);
        }

    }
   
}
