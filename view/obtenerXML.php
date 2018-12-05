<?php

/**
 * Componente PHP que genera información XML a partir
 * de la informacion de puntos geolocalizados en una
 * base de datos.
 *
 */
include_once './Database.php';

// Creación del archivo XML, nodo padre:
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

//Se obtiene la información de la base de datos:
$pdo = Database::connect();
$sql = "select * from posiciones";
$resultado = $pdo->query($sql);

foreach ($resultado as $res) {
    //por cada registro encontrado se crea un nodo hijo XML:
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("sucursal", utf8_encode($res['sucursal']));
    $newnode->setAttribute("observaciones", utf8_encode($res['observaciones']));
    $newnode->setAttribute("latitud", utf8_encode($res['latitud']));
    $newnode->setAttribute("longitud", utf8_encode($res['longitud']));
}
Database::disconnect();

//Envío del contenido XML:
header("Content-type: text/xml");
echo $dom->saveXML();
?>