<?php

class Hotel {
   private $id_hotel,$cod_hotel,$nombre,$direccion,$cod_postal,$canton;
   function __construct() {
       
   }
   function getNombre() {
       return $this->nombre;
   }

   function setNombre($nombre) {
       $this->nombre = $nombre;
   }

      function getId_hotel() {
       return $this->id_hotel;
   }

   function getCod_hotel() {
       return $this->cod_hotel;
   }

   function getDireccion() {
       return $this->direccion;
   }

   function getCod_postal() {
       return $this->cod_postal;
   }

  
   function setId_hotel($id_hotel) {
       $this->id_hotel = $id_hotel;
   }

   function setCod_hotel($cod_hotel) {
       $this->cod_hotel = $cod_hotel;
   }

   function setDireccion($direccion) {
       $this->direccion = $direccion;
   }

   function setCod_postal($cod_postal) {
       $this->cod_postal = $cod_postal;
   }
   function getCanton() {
       return $this->canton;
   }

   function setCanton($canton) {
       $this->canton = $canton;
   }


  }