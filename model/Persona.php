<?php

class Persona {
private $id,$cedula,$nombres,$apellidos,$fecha_nacimiento,$ciudad,$direccion,$telefono,$email,$clave;

function __construct() {
    
}
function getCiudad() {
    return $this->ciudad;
}

function setCiudad($ciudad) {
    $this->ciudad = $ciudad;
}

function getId() {
    return $this->id;
}

function getCedula() {
    return $this->cedula;
}

function getNombres() {
    return $this->nombres;
}

function getApellidos() {
    return $this->apellidos;
}

function getFecha_nacimiento() {
    return $this->fecha_nacimiento;
}

function getDireccion() {
    return $this->direccion;
}

function getTelefono() {
    return $this->telefono;
}

function getEmail() {
    return $this->email;
}

function getClave() {
    return $this->clave;
}

function setId($id) {
    $this->id = $id;
}

function setCedula($cedula) {
    $this->cedula = $cedula;
}

function setNombres($nombres) {
    $this->nombres = $nombres;
}

function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
}

function setFecha_nacimiento($fecha_nacimiento) {
    $this->fecha_nacimiento = $fecha_nacimiento;
}

function setDireccion($direccion) {
    $this->direccion = $direccion;
}

function setTelefono($telefono) {
    $this->telefono = $telefono;
}

function setEmail($email) {
    $this->email = $email;
}

function setClave($clave) {
    $this->clave = $clave;
}


}
