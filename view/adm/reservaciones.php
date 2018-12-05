
<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../view/index.php");
} elseif ($_SESSION['adm'] == true) {
    
}?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administracion</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/datepicker3.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>Samay Inn</span> Administracion</a>

                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php echo $_SESSION['nombres']; ?></div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

              <form action="../../controller/controller.php" method="POST">
                    <input type="hidden" value="listarClientes" name="opcion">
                    <li><a href="clientes.php"><em class="fa fa-calendar">&nbsp;</em> Clientes</a></li>
                </form>
<!--                <form action="../../controller/controller.php">
                    <input type="hidden" value="listar" name="opcion">
                    <li><a href="crear_habitacion.php"><em class="fa fa-bar-chart">&nbsp;</em> Crear Habitacion</a></li>   
                </form>-->
                   <form action="../../controller/controller.php">
                    <input type="hidden" value="listar" name="opcion">
                    <li><a href="reservaciones.php"><em class="fa fa-bar-chart">&nbsp;</em> Reservaciones</a></li>   
                </form>

                <li><a href="../../view/desconectar.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div><!--/.row-->
            

            <div class="panel panel-container">
                <div class="row">
                    <div class="col-lg-12">
                          <form action="../../controller/controller.php " method="POST">
                    <input type="hidden" value="listarClientes" name="opcion">
                    <input type="submit" value="listarClientes" name="opcion">                    
                
                        <table border="1">
                            <tr>
                                <th>ID CLIENTE</th>
                                <th>APELLIDOS</th>
                                <th>NOMBRES</th>
                                <th>F. NACIMIENTO</th>
                                <th>CIUDAD</th>
                                <th>TELEFONO</th>
                                <th>EMAIL</th>
                            </tr>

                            <?php
                            
//                            include '../../model/PersonaModel.php';
                            include '../../model/HabitacionModel.php';
                            //verificamos si existe en sesion el listado de productos:
                            if (isset($_SESSION['listadoCli'])) {
                                $listadoCli = unserialize($_SESSION['listadoCli']);
                                foreach ($listadoCli as $per) {
                                    echo "<tr>";
                                    echo "<td>" . $per->getId() . "</td>";
                                    echo "<td>" . $per->getApellidos() . "</td>";
                                    echo "<td>" . $per->getNombres() . "</td>";
                                    echo "<td>" . $per->getFecha_nacimiento() . "</td>";
                                    echo "<td>" . $per->getCiudad() . "</td>";
                                    echo "<td>" . $per->getTelefono() . "</td>";
                                    echo "<td>" . $per->getEmail() . "</td>";
                                    echo "<td><a href='../../controller/controller.php?opcion=eliminarCliente&id=" . $per->getId() . "'>eliminar</a></td>";
                                    echo "<td><a href='../../controller/controller.php?opcion=cargarCliente&id=" . $per->getId() . "'>actualizar</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "No se han cargado datos.";
                            }
                            ?>
                        </table>
                    </form>
                        <a href="../adm/index.php">Volver</a>

                    </div>
                </div><!--/.row-->
            </div>

            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>New Orders</h4>
                            <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Comments</h4>
                            <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>New Users</h4>
                            <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>Visitors</h4>
                            <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span></div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->


            <div class="panel panel-default">
                <div class="panel-heading">
                    To-do List
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <ul class="dropdown-settings">
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 1
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 2
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 3
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>

                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" /><span class="input-group-btn">
                            <button class="btn btn-primary btn-md" id="btn-todo">Add</button>
                        </span></div>
                </div>
            </div>              
            
            <div class="col-sm-12">
                <p class="back-link">Samay Inn 2018 <a href="../../view/index.php"> Pagina principal</a></p>
            </div>
        </div><!--/.row-->
    

    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/chart.min.js"></script>
    <script src="../js/chart-data.js"></script>
    <script src="../js/easypiechart.js"></script>
    <script src="../js/easypiechart-data.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/custom.js"></script>
    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>
</body>
</html>
