<?php

class TipoHabitacion {
private $id_tipo,$nombre,$caracteristicas,$precio;
function getId_tipo() {
    return $this->id_tipo;
}

function getNombre() {
    return $this->nombre;
}

function getCaracteristicas() {
    return $this->caracteristicas;
}

function getPrecio() {
    return $this->precio;
}

function setId_tipo($id_tipo) {
    $this->id_tipo = $id_tipo;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setCaracteristicas($caracteristicas) {
    $this->caracteristicas = $caracteristicas;
}

function setPrecio($precio) {
    $this->precio = $precio;
}
}
