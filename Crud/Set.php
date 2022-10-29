<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once "controlador.php";
$db = db::getDBConnection();

$jsonElemento = json_decode(file_get_contents("php://input"));
if (!$jsonElemento) {
    exit("No hay datos");
}
//************************ items********************* */
$answer = $db->SetItem(
    $jsonElemento->id_producto,
    $jsonElemento->id_pedido,
    $jsonElemento->comentario);

// //************************ pedidos********************* */
// $answer = $db->SetPedido(
//     $jsonElemento->id_usuario,
//     $jsonElemento->id_mesa,
//     $jsonElemento->estado,
//     $jsonElemento->valor);

//************************** Mesas ******************/
// $answer = $db->SetMesa(
//     $jsonElemento->nombre,
//     $jsonElemento->disponibilidad,
//     $jsonElemento->descripcion);

//************************ PRODUCTOS ********************* */
// $answer = $db->SetProducto(
//     $jsonElemento->nombre,
//     $jsonElemento->valor,
//     $jsonElemento->foto,
//     $jsonElemento->descripcion,
//     $jsonElemento->disponibilidad);

//****************** Usuarios **************** */

// $answer = $db->Setuser(
//     $jsonUsuario->username, 
//     $jsonUsuario->pass,
//     $jsonUsuario->name,
//     $jsonUsuario->rol);

if ($answer){
	echo '{"bien":8}';
}
else{
    echo '{"Mal":8}';
}