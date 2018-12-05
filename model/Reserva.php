<?php

class Reserva {
  private $id_reserva,$id_cliente,$id_hotel,$id_habitacion,$fecha_reserva,$fecha_inicio,$fecha_fin;
  

  function getId_reserva() {
      return $this->id_reserva;
  }

  function getId_cliente() {
      return $this->id_cliente;
  }

  function getId_hotel() {
      return $this->id_hotel;
  }

  function getId_habitacion() {
      return $this->id_habitacion;
  }

  function getFecha_reserva() {
      return $this->fecha_reserva;
  }

  function getFecha_inicio() {
      return $this->fecha_inicio;
  }

  function getFecha_fin() {
      return $this->fecha_fin;
  }

  function setId_reserva($id_reserva) {
      $this->id_reserva = $id_reserva;
  }

  function setId_cliente($id_cliente) {
      $this->id_cliente = $id_cliente;
  }

  function setId_hotel($id_hotel) {
      $this->id_hotel = $id_hotel;
  }

  function setId_habitacion($id_habitacion) {
      $this->id_habitacion = $id_habitacion;
  }

  function setFecha_reserva($fecha_reserva) {
      $this->fecha_reserva = $fecha_reserva;
  }

  function setFecha_inicio($fecha_inicio) {
      $this->fecha_inicio = $fecha_inicio;
  }

  function setFecha_fin($fecha_fin) {
      $this->fecha_fin = $fecha_fin;
  }


}
