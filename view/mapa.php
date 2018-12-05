<?php
require_once '../model/PersonaModel.php';
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <title>Samay Inn</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
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

        <style>
            #map {
                height: 80%;
                width: 50%;
            }
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
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
                        <div class="w3ls_search">
                            <div class="cd-main-header">
                                <ul class="cd-header-buttons">
                                    <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                                </ul> <!-- cd-header-buttons -->
                            </div>
                            <div id="cd-search" class="cd-search">
                                <form action="#" method="post">
                                    <input name="Search" type="search" placeholder="Search...">
                                </form>
                            </div>
                        </div>
                    </div> 


                    <center> <h3 class="tittle why">Sucursal Principal</h3></center>
                    <div id="map">

                    </div>                              

                   
                    <script>
                        //Funcion principal de inicializacion del mapa, en la cual se 
                        //crea el mapa y se llena de puntos desde la BDD:
                        function initMap() {
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: {lat: 0.351657, lng: -78.117933},
                                zoom: 12
                            });
                            var infoWindow = new google.maps.InfoWindow({map: map});

                            //Obtiene los datos XML desde la BDD y los muestra en el
                            //mapa mediante los objetos Markers (marcadores de Google Maps)
                            downloadUrl('http://localhost:81/pruebaGoogleMaps/obtenerXML.php', function (data) {
                                var xml = data.responseXML;
                                var markers = xml.documentElement.getElementsByTagName('marker');
                                Array.prototype.forEach.call(markers, function (markerElem) {
                                    var sucursal = markerElem.getAttribute('sucursal');
                                    var observaciones = markerElem.getAttribute('observaciones');
                                    var point = new google.maps.LatLng(
                                            parseFloat(markerElem.getAttribute('latitud')),
                                            parseFloat(markerElem.getAttribute('longitud')));

                                    var infowincontent = document.createElement('div');
                                    var strong = document.createElement('strong');
                                    strong.textContent = nombre;
                                    infowincontent.appendChild(strong);
                                    infowincontent.appendChild(document.createElement('br'));

                                    var text = document.createElement('text');
                                    text.textContent = observaciones;
                                    infowincontent.appendChild(text);

                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: point
                                    });
                                    //Listener click para mostrar un cuadro informativo
                                    //cuando el usuario seleccione un marcador del mapa:
                                    marker.addListener('click', function () {
                                        infoWindow.setContent(infowincontent);
                                        infoWindow.open(map, marker);
                                    });
                                });
                            });

                            // Intentar geolocalizar con HTML5 la ubicacion actual:
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function (position) {
                                    var pos = {
                                        lat: position.coords.latitude,
                                        lng: position.coords.longitude
                                    };

                                    infoWindow.setPosition(pos);
                                    infoWindow.setContent('Su ubicacion esta aqui.');
                                    //Centro del mapa:
                                    map.setCenter(pos);
                                }, function () {
                                    handleLocationError(true, infoWindow, map.getCenter());
                                });
                            } else {
                                // El navegador no soporta Geolocalizacion:
                                handleLocationError(false, infoWindow, map.getCenter());
                            }

                            //Listener click para que el usuario pueda seleccionar
                            //un punto en el mapa y se cree un nuevo marcador. Adicionalmente
                            //se llena los datos de las coordenadas en el formulario
                            //para poder luego guardarlos en la BDD:
                            map.addListener('click', function (e) {
                                placeMarkerAndPanTo(e.latLng, map);
                                var txtLatitud = document.getElementById('txtLatitud');
                                txtLatitud.value = e.latLng.lat();
                                var txtLongitud = document.getElementById('txtLongitud');
                                txtLongitud.value = e.latLng.lng();
                            });
                        }

                        //Crea un marcador y lo posiciona en el centro del mapa:
                        function placeMarkerAndPanTo(latLng, map) {
                            var marker = new google.maps.Marker({
                                position: latLng,
                                map: map
                            });
                            map.panTo(latLng);
                        }

                        //Funcion para obtener el contenido XML:
                        function downloadUrl(url, callback) {
                            var request = window.ActiveXObject ?
                                    new ActiveXObject('Microsoft.XMLHTTP') :
                                    new XMLHttpRequest;

                            request.onreadystatechange = function () {
                                if (request.readyState == 4) {
                                    request.onreadystatechange = doNothing;
                                    callback(request, request.status);
                                }
                            };

                            request.open('GET', url, true);
                            request.send(null);
                        }

                        function doNothing() {}

                        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                            infoWindow.setPosition(pos);
                            infoWindow.setContent(browserHasGeolocation ?
                                    'Error: El servicio de Geolocalizacion fallo.' :
                                    'Error: Este navegador no soporta geolocalizacion.');
                        }

                    </script>
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhBjgI5XEG5Vaw6bwn8NBtCcgWp0PZ_bA&callback=initMap">
                    </script>


                    <div class="clearfix"> </div>
                   
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