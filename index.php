<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="scr/js/actualizarIndex.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<?php
$pag="inicio";
include ("scr/php/menu.php");
?>
<div class="container-fluid">
<div class="row" style="padding-bottom: 10px;">
    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 " style=" padding-bottom: 7px; border-bottom: 1px solid ">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <img src="scr\img\uplafi.png" class="img-responsive"/>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <img src="scr\img\armada.png" class="img-responsive"/>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <img src="scr\img\conaf.png" class="img-responsive"/>
        </div>
    </div>
</div>
<div class="col-md-10 col-md-offset-1">

    <div class="row">
        <p class="text-justify">La Facultad de Ingeniería en colaboración con la Dirección de Meteorología de la Armada de Chile y la Corporación Nacional Forestal (CONAF) se encuentra habilitando estaciones meteorológicas Davis en diferentes áreas protegidas de la Región de Valparaíso.
            En una primera fase se habilitaron El Parque Nacional La Campana y Santuario de la Naturaleza Laguna el Peral.
            Próximamente se espera agregar La Reserva Nacional El Yali y La Reserva Nacional Lago Peñuelas, finalmente se espera agregar un equipo en las propias dependencias de la Facultad de Ingeniería. Los datos instantáneos son publicados en línea en los enlaces que se presentan a continuación y aquellos investigadores que requieran las series de tiempo pueden solicitarlas a nuestra Facultad.</p>
        <br>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="thumbnail">
                <img src="scr/img/Yali.jpg" alt="..." height="200px" width="400px">
                <div class="caption">
                    <h3>Estación El Yali</h3>
                    <p>...</p>
                    <center><p><a href="yali.php" class="btn btn-primary" role="button">Entrar</a> </p></center>
                </div>
            </div>
        </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="thumbnail">
                    <img src="scr/img/Campana.jpg" alt="..." height="200px" width="400px">
                    <div class="caption">
                        <h3>Estación La Campana</h3>
                        <p>...</p>
                        <center><p><a href="#" class="btn btn-primary" role="button">Entrar</a> </p></center>
                    </div>
                </div>
             </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <img src="scr/img/Peral.jpg" alt="..." height="200px" width="400px">
                        <div class="caption">
                            <h3>Estación El Peral</h3>
                            <p>...</p>
                            <center><p><a href="#" class="btn btn-primary" role="button">Entrar</a> </p></center>
                        </div>
                    </div>
                </div>

    </div>
</div>
</div>
</body>
