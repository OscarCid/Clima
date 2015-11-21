<style>body { padding-top: 70px}</style>
<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.upla.cl" target="_blank"><img alt="" src="scr/img/logo_upla_color.png" height="25px"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

<?php
                switch ($pag)
                {
                case 'inicio':
                echo  '<li class="active"><a href="index">Inicio</a></li>
                <li><a href="yali">Estación El Yali </a></li>
                <li><a href="campana">Estación La Campana</a></li>
                <li><a href="peral">Estación El Peral</a></li>'                              ;

                break;
                case 'yali':
                echo '<li><a href="index">Inicio</a></li>
                <li class="active"><a href="yali">Estación El Yali</a></li>
                <li><a href="campana">Estación La Campana</a></li>
                <li><a href="peral">Estación El Peral</a></li>'                               ;

                break;
                case 'campana':
                echo '<li><a href="index">Inicio</a></li>
                <li><a href="yali">Estación El Yali </a></li>
                <li class="active"><a href="#">Estación La Campana</a></li>
                <li><a href="peral">Estación El Peral</a></li>'                                ;

                break;
                case 'peral':
                    echo '<li><a href="index">Inicio</a></li>
                <li><a href="yali">Estación El Yali </a></li>
                <li><a href="campana">Estación La Campana</a></li>
                <li class="active"><a href="peral">Estación El Peral</a></li>'                                ;

                break;

                default:
                return 'Error';
                }

?>

<!--                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Afiliados<span class="caret"></span></a>
                    <ul class="dropdown-menu">
-->


                <!-- </ul>
                </li>
                </ul>
                -->

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>