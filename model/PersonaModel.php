
<?php

include 'Database.php';

class PersonaModel {

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
        $sql = "select * from cliente";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        $listadoC = array();
        include 'Persona.php';
        foreach ($resultadoP as $per) {
            $persona = new Persona();
            $persona->setId($per['id']);
            $persona->setApellidos($per['apellidos']);
            $persona->setNombres($per['nombres']);
            $persona->setFecha_nacimiento($per['fecha_nacimiento']);
            $persona->setCiudad($per['ciudad']);
            $persona->setTelefono($per['telefono']);
            $persona->setEmail($per['email']);
            array_push($listadoC, $persona);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listadoC;
    }

    public function getCiudades() {
//obtenemos la informacion de la bdd:
        $pdo = Database::connect();
//verificamos el ordenamiento asc o desc:
        $sql = "select * from ciudad";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        $listado = array();
        foreach ($resultado as $res) {
            $ciudad = new Ciudad();
            $ciudad->setId_ciudad($res['id_ciudad']);
            $ciudad->setCiudad($res['ciudad']);
            array_push($listado, $ciudad);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listado;
    }

    public function agendarReserv($id_reserva, $id_cliente, $id_hotel, $tipo_habitacion,$fecha_reserva, $fecha_inicio, $fecha_fin) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Preparamos la sentencia con parametros:
        $sql = "insert into reservas (id_reserva, id_cliente, id_hotel, 
            id_tipo, fecha_reserva, fecha_inicio, fecha_fin) values(?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id_reserva, $id_cliente, $id_hotel,
                $tipo_habitacion, $fecha_reserva, $fecha_inicio, $fecha_fin));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
