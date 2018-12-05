<?php

include 'Database.php';

class HabitacionModel {

    public function crearHabitacion($cod_habitacion, $id_hotel, $id_tipo, $ocupada) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Preparamos la sentencia con parametros:
        $sql = "insert into habitacion (cod_habitacion,id_hotel,id_tipo,ocupada) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($cod_habitacion, $id_hotel, $id_tipo, $ocupada));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        //$consulta->execute(array($codigo, $nombre, $precio, $cantidad));
        Database::disconnect();
    }

    /**
     * Elimina un producto especifico de la bdd.
     * @param type $cod_habitacion
     */
    public function eliminarHabitacion($cod_habitacion) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from habitacion where codigo=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($cod_habitacion));
        Database::disconnect();
    }

    public function actualizarHabitacion($cod_habitacion, $id_hotel, $id_tipo, $ocupada) {
//Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update habitacion set id_hotel=?,id_tipo=?,ocupada=? where cod_habitacion=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($id_hotel, $id_tipo, $ocupada, $cod_habitacion));
        Database::disconnect();
    }

    public function getHabitacion($sucursal,$tipo_hab) {
//Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
//Utilizamos parametros para la consulta:
        $sql = "select * from habitacion where id_hotel=? and tipo_hab=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($sucursal));
//Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
//Transformamos el registro obtenido a objeto:
        $habitacion = new Habitacion();
        $habitacion->setCod_habitacion($dato['cod_habitacion']);
        $habitacion->setId_hotel($dato['id_hotel']);
        $habitacion->setId_tipo($dato['id_tipo']);
        $habitacion->setOcupada($dato['ocupada']);
        Database::disconnect();
        return $habitacion;
    }

    public function getSucursales() {
//Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
//Utilizamos parametros para la consulta:
        $sql = "select * from hotel";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        $sucur = array();
        include 'Hotel.php';
        foreach ($resultado as $res) {
            $sucursal = new Hotel();
            $sucursal->setId_hotel($res['id_hotel']);
            $sucursal->setCanton($res['canton']);
            array_push($sucur, $sucursal);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $sucur;
    }

    public function getHabitaciones() {
//Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        
//Utilizamos parametros para la consulta:
        $sql = "select * from habitacion";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        include 'Habitacion.php';
        $listado = array();
        foreach ($resultado as $res) {
            $habitacion = new Habitacion();
            $habitacion->setCod_habitacion($res['cod_habitacion']);
            $habitacion->setNumero($res['numero']);
            $habitacion->setId_hotel($res['id_hotel']);
            $habitacion->setId_tipo($res['id_tipo']);            
            $habitacion->setOcupada($res['ocupada']);
            array_push($listado, $habitacion);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listado;
    }

    public function getTipoHabitacion() {
//Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
//Utilizamos parametros para la consulta:
        $sql = "select * from tipo_habitacion";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        $tipo_h = array();
        include 'TipoHabitacion.php';
        foreach ($resultado as $res) {
            $habitacion = new TipoHabitacion();
            $habitacion->setId_tipo($res['id_tipo']);
            $habitacion->setNombre($res['nombre']);
            array_push($tipo_h, $habitacion);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $tipo_h;
    }

    public function crearCliente($nombres, $apellidos, $fecha_nacimiento, $ciudad, $direccion, $telefono, $email, $clave) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Preparamos la sentencia con parametros:
        $sql = "insert into cliente (nombres,apellidos,fecha_nacimiento,ciudad,direccion,telefono,email,clave) values(?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($nombres, $apellidos, $fecha_nacimiento, $ciudad, $direccion, $telefono, $email, $clave));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCliente($id_cliente) {        
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from cliente where id_cliente=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($id_cliente));
        Database::disconnect();
    }

    public function actualizarCliente($nombres, $apellidos, $fecha_nacimiento, $ciudad, $direccion, $telefono, $email, $clave) {
//Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update cliente set (nombres=?, apellidos=?, fecha_nacimiento=?, ciudad=?, direccion=?, telefono=?, email=?, clave=?)  where id_cliente=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($nombres, $apellidos, $fecha_nacimiento, $ciudad, $direccion, $telefono, $email, $clave));
        Database::disconnect();
    }

    public function getClientes() {
        
//obtenemos la informacion de la bdd:
        $pdo = Database::connect();
//verificamos el ordenamiento asc o desc:
        include 'Persona.php';
        $sql = "select * from cliente";
        $listadoCli = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        
        $listadoCli= array();        
        foreach ($listadoCli as $per) {
            $persona = new Persona();
            $persona->setId($per['id_cliente']);
            $persona->setApellidos($per['apellidos']);
            $persona->setNombres($per['nombres']);
            $persona->setFecha_nacimiento($per['fecha_nacimiento']);
            $persona->setCiudad($per['ciudad']);
            $persona->setTelefono($per['telefono']);
            $persona->setEmail($per['email']);
            array_push($listadoCli, $persona);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listadoCli;
    }

    public function getCiudades() {
//obtenemos la informacion de la bdd:
        $pdo = Database::connect();
//verificamos el ordenamiento asc o desc:
        $sql = "select * from ciudad";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        $listCiu = array();
        foreach ($resultado as $res) {
            $ciudad = new Ciudad();
            $ciudad->setId_ciudad($res['id_ciudad']);
            $ciudad->setCiudad($res['ciudad']);
            array_push($listCiu, $ciudad);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listCiu;
    }

    public function agendarReserva($id_cliente, $id_hotel, $id_tipo, $fecha_reserva, $fecha_inicio, $fecha_fin) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Preparamos la sentencia con parametros:
        $sql = "insert into reservaciones (id_cliente, id_hotel, 
            id_tipo, fecha_reserva, fecha_inicio, fecha_fin) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array( $id_cliente, $id_hotel,
                $id_tipo, $fecha_reserva, $fecha_inicio, $fecha_fin));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
}