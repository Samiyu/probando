<?php

class Habitacion {

    private $cod_habitacion,$numero, $id_hotel, $id_tipo, $ocupada;
    function __construct() {        
    }

    
    function getCod_habitacion() {
        return $this->cod_habitacion;
    }

    function getId_hotel() {
        return $this->id_hotel;
    }
    function getNumero() {
        return $this->numero;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

        function getId_tipo() {
        return $this->id_tipo;
    }

    function getOcupada() {
        return $this->ocupada;
    }

    function setCod_habitacion($cod_habitacion) {
        $this->cod_habitacion = $cod_habitacion;
    }

    function setId_hotel($id_hotel) {
        $this->id_hotel = $id_hotel;
    }

    function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    function setOcupada($ocupada) {
        $this->ocupada = $ocupada;
    }

}
