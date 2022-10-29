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
$answer = $db->UpdateItem(
    $jsonElemento->id
    $jsonElemento->id_producto,
    $jsonElemento->id_pedido,
    $jsonElemento->comentario);

// //************************ pedidos********************* */
// $answer = $db->UpdatePedido(
//     $jsonElemento->id,
//     $jsonElemento->id_usuario,
//     $jsonElemento->id_mesa,
//     $jsonElemento->estado,
//     $jsonElemento->valor);

// //************************** Mesas **********************/

// $answer = $db->UpdateMesa(
//     $jsonElemento->id,
//     $jsonElemento->nombre,
//     $jsonElemento->disponibilidad,
//     $jsonElemento->descripcion);

/*************** Producto *******************/
// $answer = $db->UpdateProducto(
//     $jsonElemento->id,
//     $jsonElemento->nombre,
//     $jsonElemento->valor,
//     $jsonElemento->foto,
//     $jsonElemento->descripcion,
//     $jsonElemento->disponibilidad);

if ($answer){
    echo '{"bien":8}';
}
else{
    echo '{"Mal":8}';
}