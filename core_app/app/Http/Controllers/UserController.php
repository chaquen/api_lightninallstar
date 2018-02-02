<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Profesor;

use App\Deportista;

use App\Util;

use App\Random;

class UserController extends Controller
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
        //User::insertGetId([]);
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

    public function login(Request $request){
        $datos=Util::decodificar_json($request->get("datos"));
        
        $us=User::where([["email","=",$datos["datos"]->email],["password","=",$datos["datos"]->password]])->get();
        //var_dump($us[0]->rol);
        if(count($us)>0){
                $id=$us[0]->id;
                switch ($us[0]->rol) {
                    case 'admin':
                        $us=Profesor::join("users","users.id","=","fk_id_usuario")->where("fk_id_usuario","=",$id)->select("users.id","users.email","profesors.nombres","profesors.apellidos","profesors.fecha_nacimiento","users.rol","profesors.id as id_user","profesors.genero")->get();
                        //var_dump($us[0]);
                        break;
                    case 'entrenador':
                        $us=Profesor::join("users","users.id","=","fk_id_usuario")->where("fk_id_usuario","=",$id)->select("users.id","users.email","profesors.nombres","profesors.apellidos","profesors.fecha_nacimiento","users.rol","profesors.id as id_user","profesors.genero")->get();
                       
                        # code...
                        break;
                    case 'deportista':
                        $us=Deportista::join("users","users.id","=","fk_id_usuario")->where(["fk_id_usuario","=",$us[0]->id])->select("users.id","users.email","deportistas.nombres","deportistas.apellidos","deportistas.fecha_nacimiento","users.rol","deportistas.id as id_user","deportistas.genero")->get();
                        # code...
                        break;    
                    
                }
                //aqui debe validar si es hombre o mujer
                //traer los datos de las tablas de acuerdo al rol
                $msn="";
                if($us[0]->genero=="M"){
                    $msn="Bienvenido ".$us[0]->nombres." ".$us[0]->apellidos;
                }else {
                    $msn="Bienvenida ".$us[0]->nombres." ".$us[0]->apellidos;
                }
                return response()->json(["mensaje"=>$msn ,"respuesta"=>true,"datos"=>$us[0]]);
        }else{
            return response()->json(["mensaje"=>"Los datos ingresados no corresponde a ningun usuario registrado" ,"respuesta"=>false]);
        }
    }   

    public function recuperar_pass(Request $request){
         $datos=Util::decodificar_json($request->get("datos"));
        
        $us=User::where("email","=",$datos["datos"]->email)->get();
        if(count($us)){
            $nueva_clave=Random::AlphaNumeric(6);
            User::where("id","=",$us[0]->id)->update(["password"=>$nueva_clave]);            
            Util::enviar_email("email.recuperar_pass",["clave"=>$nueva_clave],"info@lightningallstar.com","soporte lightning all star","Recuperacion de contraseña",$datos["datos"]->email,$datos["datos"]->email);
            return response()->json(["mensaje"=>"Hemos enviado un correo electronico con tu nueva clave" ,"respuesta"=>true]);   
        
        }else{
            return response()->json(["mensaje"=>"Los datos ingresados no corresponde a ningun usuario registrado" ,"respuesta"=>false]);   
        }
    }
}
