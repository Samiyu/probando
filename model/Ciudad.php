<?php

class Ciudad {
    private $id_ciudad,$ciudad;
    function __construct() {
        
    }
    function getId_ciudad() {
        return $this->id_ciudad;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function setId_ciudad($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }


}
