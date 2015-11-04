<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="../js/actualizarIndex.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
<style>body { padding-top: 60px}</style>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.upla.cl"><img alt="" src="scr/img/logo_upla_color_fondo_negro.png" height="25px"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Inicio</a></li>
                <li class="active"><a href="#">Estación El Yali <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Estación La Campana</a></li>
                <li><a href="#">Estación El Peral</a></li>
                <li><a href="#">Estación El Peral</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php

$sun_info = date_sun_info(strtotime("now"), -33.7886, -71.6873);
date_default_timezone_set('America/Argentina/Buenos_Aires');
$sunrise = date("H:i",$sun_info['sunrise']);
$sunset = date("H:i",$sun_info['sunset']);
$civil_twilight_begin = date("H:i",$sun_info['civil_twilight_begin']);
$civil_twilight_end = date("H:i",$sun_info['civil_twilight_end']);

?>
<div class="row"><div class="col-md-12">
        <div class="col-md-9 col-md-offset-1 ">
            <div class="row">
                <div class="row">
                    <div class="col-sm-3"><p class="text-justify"><strong>Amanecer:</strong><?php echo ' '.$civil_twilight_begin;?></p></div>
                    <div class="col-sm-3"><p class="text-justify"><strong>Salida del sol:</strong><?php echo ' '.$sunrise;?> </p></div>
                    <div class="col-sm-5"><p class="text-justify"><strong>Salida de la luna:</strong></p></div>
                </div>
                <div class="row">
                    <div class="col-sm-3"><p class="text-justify"><strong>Anochecer:</strong><?php echo ' '.$civil_twilight_end;?></p></div>
                    <div class="col-sm-3"><p class="text-justify"><strong>Puesta del sol:</strong><?php echo ' '.$sunset;?></p></div>
                    <div class="col-sm-5"><p class="text-justify"><strong>Puesta de la luna:</strong></p></div>
                </div>
                <div class="row">
                    <div class="col-sm-3"><p class="text-justify"><strong>Luz del dia:</strong></p></div>
                    <div class="col-sm-3"><p class="text-justify"><strong>Duración del dia:</strong></p></div>
                    <div class="col-sm-5"><strong>Fase de la luna:</strong>
                        <?php
                        function moon_phase($year, $month, $day)
                        {
                            /*
                            modified from http://www.voidware.com/moon_phase.htm
                            */
                            $c = $e = $jd = $b = 0;
                            if ($month < 3)
                            {
                                $year--;
                                $month += 12;
                            }
                            ++$month;
                            $c = 365.25 * $year;
                            $e = 30.6 * $month;
                            $jd = $c + $e + $day - 694039.09;	//jd is total days elapsed
                            $jd /= 29.5305882;					//divide by the moon cycle
                            $b = (int) $jd;						//int(jd) -> b, take integer part of jd
                            $jd -= $b;							//subtract integer part to leave fractional part of original jd
                            $b = round($jd * 8);				//scale fraction from 0-8 and round
                            if ($b >= 8 )
                            {
                                $b = 0;//0 and 8 are the same so turn 8 into 0
                            }
                            switch ($b)
                            {
                                case 0:
                                    return 'Luna Nueva';
                                    break;
                                case 1:
                                    return 'Luna Creciente';
                                    break;
                                case 2:
                                    return 'Luna Cuarto Creciente';
                                    break;
                                case 3:
                                    return 'Luna Gibosa Creciente';
                                    break;
                                case 4:
                                    return 'Luna Llena';
                                    break;
                                case 5:
                                    return 'Luna Gibosa Menguante';
                                    break;
                                case 6:
                                    return 'Luna Cuarto Menguante';
                                    break;
                                case 7:
                                    return 'Luna Menguante';
                                    break;
                                default:
                                    return 'Error';
                            }
                        }
                        $timestamp = time();
                        echo moon_phase(date('Y', $timestamp), date('n', $timestamp), date('j', $timestamp));

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <img src="scr\img\11986926_10207675732917222_8238076877955775449_n.jpg" height="90px" class="center-block"/>
        </div>
    </div>

        <div class='col-md-10 col-md-offset-1' ><p class="text-justify">
                <br> La facultad de Ingeniería de la Universidad de Playa Ancha en colaboración con la Dirección de Meteorologia de la Armada de Chile y la Corporación Nacional Forestal (CONAF) se encuentra habilitando estaciones meteorológicas Davis en diferentes áreas protegidas de la Región de Valparaiso. </br>
                La estación meteorológica en uso es el Davis Vantage Pro2, y estas paginas se actualizan cada 5 minutos. El dia meteorológico utilizado en esta estación termina a la medianoche.</p>
        </div>

</div>





</body>
