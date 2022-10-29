<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once "controlador.php";
$db = db::getDBConnection();

$jsonElemento = json_decode(file_get_contents("php://input"));
if (!$jsonElemento) {
    exit("No hay datos");
}

//*********************** Items ***********************/
$answer = $db->GetItem($jsonElemento->id);
echo json_encode([mysqli_fetch_array($answer,MYSQLI_ASSOC)]);//Retorna un objeto con los campos y valores en estring

// //*********************** Pedidos ***********************/
// $answer = $db->GetPedido($jsonElemento->id_mesa);
// echo json_encode([mysqli_fetch_array($answer,MYSQLI_ASSOC)]);//Retorna un objeto con los campos y valores en estring

//********************** Mesas *******************/
// $answer = $db->GetMesa($jsonElemento->nombre);
// echo json_encode([mysqli_fetch_array($answer,MYSQLI_ASSOC)]);//Retorna un objeto con los campos y valores en estring

//*********************** Productos ***********************/
// $answer = $db->GetProducto($jsonElemento->nombre);
// echo json_encode([mysqli_fetch_array($answer,MYSQLI_ASSOC)]);//Retorna un objeto con los campos y valores en estring

// //************************* Usuarios ************** */
// $answer = $db->GetUser($jsonElemento->username, $jsonElemento->pass);
// echo json_encode([mysqli_fetch_array($answer,MYSQLI_ASSOC)]);//Retorna un objeto con los campos y valores en estring


//******************************************************** */
// $datos = mysqli_fetch_object($answer);
// echo json_encode([
// "Id"=> $datos->id,
// "Username"=> $datos->username,
// "Pass"=> $datos->password,
// "Name"=> $datos->name,
// "Rol"=> $datos->rol
// ]);


/////********************** */
// echo json_encode([mysqli_fetch_object($answer)]);
/////***************************** */
//echo json_encode([mysqli_fetch_row($answer)]);//Retorna todos los valores de cada campo en string
//echo json_encode([mysqli_fetch_array($answer,MYSQLI_ASSOC)]);//Retorna los campos y valores en estring
//echo json_encode([mysqli_fetch_array($answer,MYSQLI_NUM)]);//Retorna solo los valores de cada campo en string
//echo json_encode([mysqli_fetch_array($answer, MYSQLI_BOTH)]);//Retorna Ambas opciones anteriores