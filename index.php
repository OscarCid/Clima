<!DOCTYPE html>
<html>
<?php include 'scr/conexion.php';
require_once("scr/php/login/myDBC.php");
?>

<head>
    <title>Meteorologia UPLA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="scr/js/actualizarIndex.js"></script>
    <link rel="icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class="container-fluid">
<?php
$pag="inicio";
include ("scr/php/menu.php");
?>

<style>
/* unvisited link */
#lonk a:link {
    color: black !important;
	text-decoration: none !important;
}

/* visited link */
#lonk a:visited {
    color: black !important;
	text-decoration: none !important;
}

/* mouse over link */
#lonk a:hover {
    color: black !important;
	text-decoration: none !important;
}

/* selected link */
#lonk a:active {
	text-decoration: none !important;
    color: black !important;
}
</style>

<?php include "scr/php/banner2.php"?>
<div class="col-md-10 col-md-offset-1">

    <div class="row">
        <p class="text-justify">La Facultad de Ingeniería en colaboración con la Dirección de Meteorología de la Armada de Chile y la Corporación Nacional Forestal (CONAF) se encuentra habilitando estaciones meteorológicas Davis en diferentes áreas protegidas de la Región de Valparaíso. En una primera fase se habilitaron El Parque Nacional La Campana y Santuario de la Naturaleza Laguna el Peral. Próximamente se espera agregar La Reserva Nacional El Yali y La Reserva Nacional Lago Peñuelas, finalmente se espera agregar un equipo en las propias dependencias de la Facultad de Ingeniería. Los datos instantáneos son publicados en línea en los enlaces que se presentan a continuación y aquellos investigadores que requieran las series de tiempo pueden solicitarlas a nuestra Facultad.</p>
        <br>
    </div>

    <div class="row" id="lonk">
        <div class="col-sm-6 col-md-4 col-lg-4">
		<a href="yali">
            <div class="thumbnail">
				<h3 class="text-center">Estación El Yali</h3>
                <img src="scr/img/Yali.jpg" alt="..." height="200px" width="500px">
                <div class="caption">

                    <p class="text-center">
                        <?php
                        $dbname="clima";
                        $query="SELECT * FROM yali ORDER BY ordenar DESC LIMIT 1 ";
                        $result=mysql_db_query ($dbname, $query, $link);
                        while ($row = mysql_fetch_array ($result)) {
                            echo "<strong>Fecha:</strong> ".$row['fecha']. " <strong>Hora: </strong>  ".$row['hora']."<br><strong>Temperatura:</strong> ".$row['temp'].".".$row['tempDec']."°C";
                        }
                        ?>
                    </p>
                    
                </div>
            </div>
		</a>
        </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
            <a href="campana">    
				<div class="thumbnail">
					<h3 class="text-center">Estación La Campana</h3>
                    <img src="scr/img/Campana.jpg" alt="..." height="200px" width="500px">
                    <div class="caption">
                        
                        <p class="text-center">
                            <?php
                            $dbname="clima";
                            $query="SELECT * FROM campana ORDER BY ordenar DESC LIMIT 1 ";
                            $result=mysql_db_query ($dbname, $query, $link);
                            while ($row = mysql_fetch_array ($result)) {
                                echo "<strong>Fecha:</strong> ".$row['fecha']. " <strong>Hora: </strong>  ".$row['hora']."<br><strong>Temperatura:</strong> ".$row['temp'].".".$row['tempDec']."°C";
                            }
                            ?>
                        </p>
                        
                    </div>
                </div>
			</a>	
             </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
				<a href="peral">
                    <div class="thumbnail">
						<h3 class="text-center">Estación El Peral</h3>
                        <img src="scr/img/Peral.jpg" alt="..." height="200px" width="500px">
                        <div class="caption">

                            <p class="text-center">
                                <?php
                                $dbname="clima";
                                $query="SELECT * FROM peral ORDER BY ordenar DESC LIMIT 1 ";
                                $result=mysql_db_query ($dbname, $query, $link);
                                while ($row = mysql_fetch_array ($result)) {
                                    echo "<strong>Fecha:</strong> ".$row['fecha']. " <strong>Hora: </strong>  ".$row['hora']."<br><strong>Temperatura:</strong> ".$row['temp'].".".$row['tempDec']."°C";
                                }
                                ?>
                            </p>
                            
                        </div>
                    </div>
				</a>	
                </div>

    </div>
</div>

</div>
<?php include ("scr/php/foot.php")?>

</body>

