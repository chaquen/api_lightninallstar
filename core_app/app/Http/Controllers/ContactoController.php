<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Util;

use App\Suscripcion;
class ContactoController extends Controller
{
    //
    public function contactar(Request $request){
    	 $datos=Util::decodificar_json($request->get("datos"));
    	 $ruta="email.contacto_web";
    	 $array_datos=["nombre"=>$datos["datos"]->name];
    	 $de="info@lightningallstar.com";
    	 $de_nombre="info lightning all star";
    	 $asunto="Gracias por contactarte";
    	 $destino=$datos["datos"]->email;
    	 $nombre_destino=$datos["datos"]->name;
    	 Util::enviar_email($ruta,$array_datos,$de,$de_nombre,$asunto,$destino,$nombre_destino);

    	 $ruta="email.nuevo_contacto";
    	 $array_datos=["nombre"=>$datos["datos"]->name,"email"=>$datos["datos"]->email,"comentario"=>$datos["datos"]->comment];
    	 $de="info@lightningallstar.com";
    	 $de_nombre="info lightning all star";
    	 $asunto="Un nuevo contacto web";
    	 //$destino="administracion@lightningallstar.com";
    	 $destino="edgar.guzman21@gmail.com";
    	 $nombre_destino="";
    	 Util::enviar_email($ruta,$array_datos,$de,$de_nombre,$asunto,$destino,$nombre_destino);

    	 return response()->json(["mensaje"=>"Gracias por contactarte","respuesta"=>true]);

    }
    public function suscribir(Request $request){
    	 $datos=Util::decodificar_json($request->get("datos"));
    	 $ruta="email.suscripcion_web";
    	 $array_datos=[];
    	 $de="info@lightningallstar.com";
    	 $de_nombre="info lightning all star";
    	 $asunto="Gracias por suscribirte";
    	 $destino=$datos["datos"]->email;
    	 $nombre_destino=$datos["datos"]->email;
    	 Util::enviar_email($ruta,$array_datos,$de,$de_nombre,$asunto,$destino,$nombre_destino);

    	 Suscripcion::create(["correo"=>$datos["datos"]->email]);
    	 

    	 return response()->json(["mensaje"=>"Gracias por suscribirte","respuesta"=>true]);

    }
}
