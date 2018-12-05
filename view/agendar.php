<?php
require '../model/HabitacionModel.php';

session_start();
if (@!$_SESSION['user']) {
    //header("Location:../view/index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Samay Inn</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
        <link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
        <!--/web-fonts-->
        <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("select[name=sucursal]").change(function () {
                    $sucursal = val($(this).val());
                });
                $("select[name=tipo_habitacion]").change(function () {
                    $tipo_hab = val($(this).val());
                });
            });
        </script>
        <script type="text/javascript">
            function ShowSelected()
            {
                /* Para obtener el valor */
                var cod = document.getElementById("sucursal").value;
                
                /* Para obtener el texto */
                var combo = document.getElementById("producto");
                var selected = combo.options[combo.selectedIndex].text;
                alert(selected);
            }
        </script>
    </head>
    <body>
        <!--/main-header-->
        <!--/banner-section-->
        <div class="w3layouts-top-strip">
            <div class="top-srip-agileinfo">
                <div class="w3ls-social-icons text-left">
                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
                    <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>

                </div>
                <div class="agileits-contact-info text-right">
                    <ul>
                        <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i> 0997361881</li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:allysamay@gmail.com">samay_inn@gmail.com</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div id="demo-1" data-zs-src='["images/4.jpg", "images/2.jpg", "images/1.jpg","images/3.jpg"]' data-zs-overlay="dots">
            <div class="demo-inner-content">
                <!--/header-w3l-->
                <div class="header-w3-agileits" id="home">
                    <div class="inner-header-agile">	
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <h1><a  href="index.html"><span>S</span>amay <p class="s-log">Inn</p></a>

                                </h1>
                            </div>
                            <!-- navbar-header -->
                             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php
                                if (isset($_SESSION['loggedin'])) {
                                    include 'navbar/navbar_login.php';
                                    
                                } else {
                                    include 'navbar/navbar_logout.php';
                                }
                                ?>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>	
                        </nav>
                       
                    </div> 

                    <!-- /plans -->
                    <div class="plans-section">
                        <div class="container">
                            <h3 class="w3l-inner-h-title">Precios y Reservacion</h3>
                            <div class="priceing-table-main">
                                <div class="col-md-3 price-grid">
                                    <div class="price-block agile">
                                        <div class="price-gd-top pric-clr1">
                                            <h4>HABITACION SIMPLE</h4>
                                            <h3><span>$</span>35</h3>
                                            <h5>1 Noche</h5>
                                        </div>
                                        <div class="price-gd-bottom">
                                            <div class="price-list">
                                                <ul>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>

                                                </ul>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>                                 

                                <div class="col-md-3 price-grid ">
                                    <div class="price-block agile">
                                        <div class="price-gd-top pric-clr2">
                                            <h4>HABITACION DOBLE</h4>
                                            <h3><span>$</span>60</h3>
                                            <h5>1 Noche</h5>
                                        </div>
                                        <div class="price-gd-bottom">
                                            <div class="price-list">

                                                <ul>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 price-grid lost">
                                    <div class="price-block agile">
                                        <div class="price-gd-top pric-clr3">
                                            <h4>HABITACION FAMILIAR</h4>
                                            <h3><span>$</span>90</h3>
                                            <h5>1 Noche</h5>
                                        </div>
                                        <div class="price-gd-bottom">
                                            <div class="price-list">
                                                <ul>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>

                                                </ul>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 price-grid wthree lost">
                                    <div class="price-block agile">
                                        <div class="price-gd-top pric-clr4">
                                            <h4>HABITACION EJECUTIVA</h4>
                                            <h3><span>$</span> 100</h3>
                                            <h5>1 NOCHE</h5>
                                        </div>
                                        <div class="price-gd-bottom">
                                            <div class="price-list">
                                                <ul>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>

                    <div class="special featured">
                        <div class="container">
                            <div class="ab-w3l-spa">
                                <div class="col-md-12 w3l_about_bottom_right two">
                                    <center> <h3 class="tittle why">Agendar Reservacion</h3></center>

                                    <div class="book-form">
                                        <form action="../controller/controller.php" method="POST">
                                            <input type="hidden" value="agendarReserva" name="opcion">
                                            

                                            <div class="col-md-10 form-date-w3-agileits">
                                                <label><i class="fa fa-home" aria-hidden="true"></i> Sucursal:</label>
                                                
                                                    <select class="form-control"  name="sucursal" id="sucursal" >               
                                                        <?php
                                                        $habitacionModel = new HabitacionModel();
                                                        $sucur = $habitacionModel->getSucursales();
                                                        foreach ($sucur as $res) {
                                                            echo "<option value='" . $res->getId_hotel() . "'>" . " " . $res->getCanton() . "</option>";
                                                        }
                                                        ?>
                                                    </select>                                            
                                            </div>                                            
                                            <div class="col-md-10 form-left-agileits-w3layouts bottom-w3ls">
                                                <label><i class="fa fa-home" aria-hidden="true"></i> Seleccione tipo de habitacion:</label>
                                                <select class="form-control" onchange="ShowSelected();" name="tipo_habitacion" >               
                                                    <?php
                                                    $habitacionModel = new HabitacionModel();
                                                    $tipo_h = $habitacionModel->getTipoHabitacion();
                                                    foreach ($tipo_h as $res) {
                                                        echo "<option value='" . $res->getId_tipo() . "'>" . " " . $res->getNombre() . "</option>";
                                                    }
                                                    ?>
                                                </select> 
                                            </div>
                                            

                                            <div class="col-md-10 form-date-w3-agileits">
                                                <label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Llegada :</label>
                                                <input  id="datepicker" name="fecha_inicio" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'mm/dd/yyyy';
                                                        }" required="required">

                                            </div>
                                            <div class="col-md-10 form-date-w3-agileits">
                                                <label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Salida :</label>
                                                <input  id="datepicker1" name="fecha_fin" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'mm/dd/yyyy';
                                                        }" required="">
                                            </div>
                                            
                                            <div class="clearfix"> </div>
                                            <div class="make wow shake" data-wow-duration="1s" data-wow-delay=".5s">
                                                <input type="submit" value="Realizar Reservacion">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="w3l-footer">
                        <div class="container">
                            <div class="footer-info-agile">
                                <div class="col-md-2 footer-info-grid links">
                                    <h4>Menu</h4>
                                    <ul>
                                        <li><a href="index.php">Inicio</a></li> 
                                        <li><a href="about.html">Sucursales</a></li> 
                                        <li><a href="codes.html">Galeria</a></li> 
                                        <li><a href="gallery.html">Ubicacion en el mapa</a></li> 
                                        <li><a href="contact.html">Contacto</a></li> 
                                    </ul>
                                </div>
                                <div class="col-md-3 footer-info-grid address">
                                    <h4>Principal</h4>
                                    <address>
                                        <ul>
                                            <li>Quito, Ecuador</li>
                                            <li>40019 Av. 6 de Diciembre</li>
                                            <li>Centro Historico</li>
                                            <li>Telefono : 0987361881</li>
                                            <li>Email : <a class="mail" href="mailto:allysamay@gmail.com">allysamay@gmail.com</a></li>
                                        </ul>
                                    </address>
                                </div>
                                <div class="col-md-3 footer-grid">
                                    <h4>Instagram</h4>
                                    <div class="footer-grid-instagram">
                                        <a href="#"><img src="images/f1.jpg" alt=" " class="img-responsive"></a>
                                    </div>
                                    <div class="footer-grid-instagram">
                                        <a href="#"><img src="images/f2.jpg" alt=" " class="img-responsive"></a>
                                    </div>
                                    <div class="footer-grid-instagram">
                                        <a href="#"><img src="images/f3.jpg" alt=" " class="img-responsive"></a>
                                    </div>
                                    <div class="footer-grid-instagram">
                                        <a href="#"><img src="images/f4.jpg" alt=" " class="img-responsive"></a>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="col-md-4 footer-info-grid">
                                    <div class="connect-social">
                                        <h4>Encuentranos:</h4>
                                        <section class="social">
                                            <ul>
                                                <li><a class="icon fb" href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a class="icon tw" href="#"><i class="fa fa-twitter"></i></a></li>


                                                <li><a class="icon pin" href="#"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a class="icon db" href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a class="icon gp" href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </section>

                                    </div>



                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                    <div class="w3agile_footer_copy">
                        <p>© 2018 Samay Inn. Todos los derechos reservados </p>
                    </div>
                    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
                    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
                    <!-- Dropdown-Menu-JavaScript -->
                    <script>
                                                    $(document).ready(function () {
                                                        $(".dropdown").hover(
                                                                function () {
                                                                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                                                                    $(this).toggleClass('open');
                                                                },
                                                                function () {
                                                                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                                                                    $(this).toggleClass('open');
                                                                }
                                                        );
                                                    });
                    </script>
                    <!-- //Dropdown-Menu-JavaScript -->


                    <script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
                    <!-- search-jQuery -->
                    <script src="js/main.js"></script>

                    <!--/script-->
                    <script src="js/simplePlayer.js"></script>
                    <script>
                                                    $("document").ready(function () {
                                                        $("#video").simplePlayer();
                                                    });
                    </script>
                    <!-- flexSlider -->
                    <script defer src="js/jquery.flexslider.js"></script>
                    <script type="text/javascript">
                                                    $(window).load(function () {
                                                        $('.flexslider').flexslider({
                                                            animation: "slide",
                                                            start: function (slider) {
                                                                $('body').removeClass('loading');
                                                            }
                                                        });
                                                    });
                    </script>
                    <!--//script for portfolio-->
                    <!-- Calendar -->
                    <link rel="stylesheet" href="css/jquery-ui.css" />
                    <script src="js/jquery-ui.js"></script>
                    <script>
                                                    $(function () {
                                                        $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
                                                    });
                    </script>
                    <!-- //Calendar -->
                    <script type="text/javascript" src="js/move-top.js"></script>
                    <script type="text/javascript" src="js/easing.js"></script>

                    <script type="text/javascript">
                                                    jQuery(document).ready(function ($) {
                                                        $(".scroll").click(function (event) {
                                                            event.preventDefault();
                                                            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
                                                        });
                                                    });
                    </script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            /*
                             var defaults = {
                             containerID: 'toTop', // fading element id
                             containerHoverID: 'toTopHover', // fading element hover id
                             scrollSpeed: 1200,
                             easingType: 'linear' 
                             };
                             */

                            $().UItoTop({easingType: 'easeOutQuart'});

                        });
                    </script>
                    <!--end-smooth-scrolling-->
                    <!--js for bootstrap working-->
                    <script src="js/bootstrap.js"></script>
                    <!-- //for bootstrap working -->
                    </body>
                    </html>
