<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Http\Requests;

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
header( 'Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS' );

Route::post("login","UserController@login");
Route::post("recuperar_pass","UserController@recuperar_pass");
Route::resource("entrenador","ProfesorController");
Route::resource("deportista","EstudianteController");
Route::get("deportistas_por_grupo/{id_grupo}","EstudianteController@deportistas_por_grupo");
//Route::get("estado_cuenta_deportista/{documento_identidad}","EstudianteController@estado_cuenta_deportista");
Route::resource("grupos","GrupoController");
Route::resource("cobro","CobroController");
Route::resource("detalle_cobro","DetalleEstudianteCobroController");
Route::resource("detalle_abonos","DetalleAbonoController");
Route::resource("competencias","CompetenciaController");
Route::resource("producto","ProductosController");
Route::post("subir_img_pro","ProductosController@subir_img_pro");
Route::resource("agenda","AgendaController");

Route::get("detalle_cobro_todos/{id_grupo}","DetalleEstudianteCobroController@detalle_cobro_todos");
Route::get("exportar_reporte_saldos/{id_grupo}/{id_deportista}","DetalleEstudianteCobroController@exportar_reporte_saldos");
Route::get("exportar_detalle_abonos/{id_deportista}/{id_cobro}","DetalleAbonoController@exportar_detalle_abonos");
Route::post("subir_img_perfil","EstudianteController@subir_img_perfil");
Route::post("contactar","ContactoController@contactar");
Route::post("suscribir","ContactoController@suscribir");
Route::get("videos",function(){
	$d=DB::table("videos")->get();

	echo json_encode(["mensaje"=>"vIDEOS ENCONTRADOS","datos"=>$d,"respuesta"=>true]);
});
Route::get("comentarios",function(){
	$d=DB::table("comentarios")->get();
	echo json_encode(["mensaje"=>"COMENTARIOS ENCONTRADOS","datos"=>$d,"respuesta"=>true]);
});
Route::post("videos","CompetenciaController@crear_video");
Route::post("comentarios","CompetenciaController@crear_comentario");
Route::put("videos/{url}",function(Request $request,$url){
	$d=DB::table("videos")->where()->get();
	echo json_encode(["mensaje"=>"vIDEOS ENCONTRADOS","datos"=>$d,"respuesta"=>true]);
});
Route::put("comentarios/{id}",function(Request $request,$id){
	$d=DB::table("comentarios")->where()->get();
	echo json_encode(["mensaje"=>"COMENTARIOS ENCONTRADOS","datos"=>$d,"respuesta"=>true]);
});
Route::delete("videos/{url}",function($id){
	$d=DB::table("videos")->where()->get();
	echo json_encode(["mensaje"=>"vIDEOS ENCONTRADOS","datos"=>$d,"respuesta"=>true]);
});
Route::delete("comentarios/{id}",function($id){
	$d=DB::table("comentarios")->where()->get();
	echo json_encode(["mensaje"=>"COMENTARIOS ENCONTRADOS","datos"=>$d,"respuesta"=>true]);
});
