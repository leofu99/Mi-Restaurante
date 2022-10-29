<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once "controlador.php";
$db = db::getDBConnection();

$jsonElemento = json_decode(file_get_contents("php://input"));
if (!$jsonElemento) {
    exit("No hay datos");
}
//$answer = $db->DeleteItem($jsonElemento->id);
$answer = $db->DeletePedido($jsonElemento->id_mesa);
//$answer = $db->DeleteUser($jsonElemento->username);
//$answer = $db->Deletemesa($jsonElemento->nombre);

if ($answer){
    echo '{"bien":8}';
}
else{
    echo '{"Mal":8}';
}