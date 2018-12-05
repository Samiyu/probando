<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
session_start();
require '../model/HabitacionModel.php';

//include_once '../model/ModelMap.php';
//$PersonaModel = new PersonaModel();
$habitacionModel = new HabitacionModel();
$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);

switch ($opcion) {
    case "listar":
//obtenemos la lista de productos:
        $listado = $habitacionModel->getHabitaciones();
//y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //obtenemos el valor total de productos y guardamos en sesion:
        //$_SESSION['valorTotal'] = $habitacionModel->getValorProductos();
        header('Location: ../view/adm/index.php');
        break;

    case "listarClientes":
//obtenemos la lista de productos:
        //$listadoCli = $habitacionModel->getClientes();
        require '../model/PersonaModel.php';
        $listadoC= $PersonaModel->getClientes();
//y los guardamos en sesion:
        $_SESSION['listadoC'] = serialize($listadoC);
        //obtenemos el valor total de productos y guardamos en sesion:
        //$_SESSION['valorTotal'] = $habitacionModel->getValorProductos();
        echo "<script>location.href='../view/adm/clientes.php'</script>";
        //header('Location: ../view/adm/clientes.php');
        break;

    case "listar reservaciones":
//obtenemos la lista de productos:
        $reservas = $habitacionModel->getHabitaciones();
//y los guardamos en sesion:
        $_SESSION['listadoR'] = serialize($listadoR);
        //obtenemos el valor total de productos y guardamos en sesion:
        //$_SESSION['valorTotal'] = $habitacionModel->getValorProductos();
        header('Location: ../view/adm/index.php');
        break;
    
    case "crear":
//navegamos a la pagina de creacion:
        header('Location: ../view/crear.php');
        break;
    case "guardar":
//obtenemos los valores ingresados por el usuario en el formulario:
        $cod_habitacion = $_REQUEST['cod_habitacion'];
        $id_hotel = $_REQUEST['id_hotel'];
        $id_tipo = $_REQUEST['id_tipo'];
        $ocupada = $_REQUEST['ocupada'];
//creamos un nuevo producto:
        try {
            $habitacionModel->crearHabitacion($cod_habitacion, $id_hotel, $id_tipo, $ocupada);
            echo '<script>alert("Se ha creado la habitacion correctamente")</script> ';
            echo "<script>location.href='../view/adm/crear_habitacion.php'</script>";
        } catch (Exception $e) {
//colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje'] = $e->getMessage();
            echo '<script>alert("Ha ocurrido un error")</script> ';
            echo "<script>location.href='../view/adm/crear_habitacion.php'</script>";
        }
        break;
    case "eliminar":
//obtenemos el codigo del producto a eliminar:
        $codigo = $_REQUEST['codigo'];
//eliminamos el producto:
        $habitacionModel->eliminarHabitacion($cod_habitacion);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $habitacionModel->getHabitaciones();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;

    case "cargar":
//para permitirle actualizar un producto al usuario primero
//obtenemos los datos completos de ese producto:
        $codigo = $_REQUEST['codigo'];
        $producto = $habitacionModel->getHabitacion($codigo);
//guardamos en sesion el producto para posteriormente visualizarlo
//en un formulario para permitirle al usuario editar los valores:
        $_SESSION['habitacion'] = $habitacion;
        header('Location: ../view/editar_hab.php');
        break;
    case "actualizar":
//obtenemos los datos modificados por el usuario:
        $cod_habitacion = $_REQUEST['cod_habitacion'];
        $id_hotel = $_REQUEST['id_hotel'];
        $id_tipo = $_REQUEST['id_tipo'];
        $ocupada = $_REQUEST['ocupada'];

//actualizamos los datos del producto:
        $habitacionModel->actualizarHabitacion($cod_habitacion, $id_hotel, $id_tipo, $ocupada);
        echo '<script>alert("Se ha actualizado la informacion correctamente")</script> ';
        echo "<script>location.href='../view/adm/index.php'</script>";
//actualizamos la lista de productos para grabar en sesion:
        //$listado = $habitacionModel->getHabitaciones();
        //$_SESSION['listado'] = serialize($listado);
        // header('Location: ../index.php');
        break;
    default:
//si no existe la opcion recibida por el controlador, siempre
//redirigimos la navegacion a la pagina index:
        header('Location: ../index.php');
        break;

    case "crearCliente":
//obtenemos los valores ingresados por el usuario en el formulario:             
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $ciudad = $_REQUEST['ciudad'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $clave = $_REQUEST['clave'];

//creamos un nuevo producto:
        try {
            $PersonaModel->crearCliente($nombres, $apellidos, $fecha_nacimiento, $ciudad, $direccion, $telefono, $email, $clave);
            echo '<script>alert("Se ha creado la cuenta correctamente")</script> ';
            echo "<script>location.href='../view/index.php'</script>";
        } catch (Exception $e) {
//colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje'] = $e->getMessage();
            echo '' . $e;
//            echo '<script>alert("Ha ocurrido un error")</script> ';
//            echo "<script>location.href='../view/crear_usuario.php'</script>";
        }
        break;

    case "eliminarCliente":
//obtenemos el codigo del producto a eliminar:
        $id_cliente = $_REQUEST['id'];
//eliminamos el producto:
        $habitacionModel->eliminarCliente($id_cliente);
//actualizamos la lista de productos para grabar en sesion:
        $listaCli = $habitacionModel->getClientes();
        $_SESSION['$listaCli'] = serialize($listaCli);
        echo '<script>alert("Se ha eliminado la cuenta correctamente")</script> ';
        echo "<script>location.href='../view/adm/clientes.php'</script>";

    case "agendarReserva":
//obtenemos los valores ingresados por el usuario en el formulario:            
        $id_hotel = $_REQUEST['sucursal'];
        $id_tipo = $_REQUEST['tipo_habitacion'];
        $fecha_reserva = date('r');
        $id_cliente = $_SESSION['user'];
        $fecha_inicio = $_REQUEST['fecha_inicio'];
        $fecha_fin = $_REQUEST['fecha_fin'];

        if ($id_cliente == NULL) {
            echo '<script>alert("Ha ocurrido un error al realizar la reservación. Favor de iniciar sesión.")</script> ';
            echo "<script>location.href='../view/login.php'</script>";
        } else {
            if ($fecha_inicio == "mm/dd/yyyy" || $fecha_inicio == "mm/dd/yyyy") {
                echo '<script>alert("Ha ocurrido un error al realizar la reservación. Revise las fechas")</script> ';
                echo "<script>location.href='../view/agendar.php'</script>";
            } else {
                $habitacionModel->agendarReserva($id_cliente, $id_hotel, $id_tipo, $fecha_reserva, $fecha_inicio, $fecha_fin);
                echo '<script>alert("Se ha reservado correctamente")</script> ';
                echo "<script>location.href='../view/index.php'</script>";
            }
        }
//        try {
//        } catch (Exception $e) {
////colocamos el mensaje de la excepcion en sesion:
//            $_SESSION['mensaje'] = $e->getMessage();
//            //echo '' . $e;
//        }
        break;

    case "insertarMapa":
        $latitud = $_GET['txtLatitud'];
        $longitud = $_GET['txtLongitud'];
        $nombre = $_GET['txtNombre'];
        $observaciones = $_GET['txtObservaciones'];
        $modelMap = new ModelMap();
        $modelMap->ingresarPunto($latitud, $longitud, $sucursal, $observaciones);
        break;
}