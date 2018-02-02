<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Profesor;

use App\Util;       

use App\User;

class ProfesorController extends Controller
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
        $su=User::where("email",$datos["datos"]->datos2->email)->get();
       
        if(count($su)==0){
            $u=User::firstOrCreate(["email"=>$datos["datos"]->datos2->email,"password"=>$datos["datos"]->datos2->password,"rol"=>"entrenador"]);
            
            $arr=(array)$datos["datos"]->datos;

            $arr["fk_id_usuario"]=$u->id;
            $dd=Profesor::where("documento_identidad","=",$datos["datos"]->datos->documento_identidad)->get();
            if(count($dd)==0){
                Profesor::firstOrCreate($arr);    
                return response()->json(["mensaje"=>"Profesor registrado" ,"respuesta"=>true]);    
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
        //var_dump($id);
        $id=explode("=", $id);
        //var_dump($id);
        if(count($id)==2){
                
                if($id[0]=="nombres"){
                    $id[1].="%";
                }

                $us=Profesor::join("users","users.id","=","profesors.fk_id_usuario")
                    ->where("profesors.".$id[0],"LIKE",$id[1])
                    ->get();
            
                return response()->json(["mensaje"=>"Usuario encontrado" ,"respuesta"=>true,"datos"=>$us]);    
                    
            

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
        

        return response()->json(["mensaje"=>"Entrenador eliminado" ,"respuesta"=>true]);
    }
}
