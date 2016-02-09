<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<style>
    .footer-distributed{
        background-color: #292c2f;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        font: bold 14px sans-serif;

        padding: 20px 50px;
        margin-top: 35px;
    }

    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
        display: inline-block;
        vertical-align: top;
    }

    /* Footer left */

    .footer-distributed .footer-left{
        width: 47%;
    }

    /* The company logo */

    .footer-distributed h3{
        color:  #ffffff;
        font: normal 36px 'Cookie', cursive;
        margin: 0;
    }

    .footer-distributed h3 span{
        color:  #5383d3;
    }

    /* Footer links */

    .footer-distributed .footer-links{
        color:  #ffffff;
        margin: 20px 0 12px;
        padding: 0;
    }

    .footer-distributed .footer-links a{
        display:inline-block;
        line-height: 1.8;
        text-decoration: none;
        color:  inherit;
    }

    .footer-distributed .footer-company-name{
        color:  #8f9296;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
    }

    /* Footer Center */

    .footer-distributed .footer-center{
        width: 35%;
    }

    .footer-distributed .footer-center i{
        background-color:  #33383b;
        color: #ffffff;
        font-size: 25px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        text-align: center;
        line-height: 42px;
        margin: 10px 15px;
        vertical-align: middle;
    }

    .footer-distributed .footer-center i.fa-envelope{
        font-size: 17px;
        line-height: 38px;
    }

    .footer-distributed .footer-center p{
        display: inline-block;
        color: #ffffff;
        vertical-align: middle;
        margin:0;
    }

    .footer-distributed .footer-center p span{
        display:block;
        font-weight: normal;
        font-size:14px;
        line-height:2;
    }

    .footer-distributed .footer-center p a{
        color:  #5383d3;
        text-decoration: none;;
    }


    /* Footer Right */

    .footer-distributed .footer-right{
        width: 15%;
    }

    .footer-distributed .footer-company-about{
        line-height: 20px;
        color:  #92999f;
        font-size: 13px;
        font-weight: normal;
        margin: 0;
    }

    .footer-distributed .footer-company-about span{
        display: block;
        color:  #ffffff;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .footer-distributed .footer-icons{
        margin-top: 25px;
    }

    .footer-distributed .footer-icons a{
        display: inline-block;
        width: 35px;
        height: 35px;
        cursor: pointer;
        background-color:  #33383b;
        border-radius: 2px;

        font-size: 20px;
        color: #ffffff;
        text-align: center;
        line-height: 35px;

        margin-right: 3px;
        margin-bottom: 5px;
    }

    /* If you don't want the footer to be responsive, remove these media queries */

    @media (max-width: 1031px) {

        .footer-distributed{
            font: bold 14px sans-serif;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right{
            display: block;
            width: 100%;
            margin-bottom: 40px;
            text-align: center;
        }
		.footer-distributed .footer-links{
			color:  #ffffff;
			margin: 35px 0 12px;
			padding: 0;
		}

        .footer-distributed .footer-center i{
            margin-left: 0;
        }

    }
</style>
<body>

<footer class="footer-distributed">

    <div class="footer-left" style="padding-top: 20px">

	<div style="height: auto">
		
	
			<a href="http://www.upla.cl/facultadingenieria" target="_blank"><img style="margin-right:5px"  alt="" src="scr/img/uplafi_negro.png" height="45px" class="img-center"></a>
		
			<a href="http://meteoarmada.directemar.cl" target="_blank"><img style="margin-right:5px" alt="" src="scr/img/armada_negro.png" height="45px" class="img-center"></a>
		
			<a href="http://www.conaf.cl" target="_blank"><img style="margin-right:5px" alt="" src="scr/img/conaf.png" height="45px" class="img-center"></a>
		

	</div>
        
		<p class="footer-links">		
            <a href="index">Inicio</a>
            ·
            <a href="http://www.upla.cl" target="_blank">UPLA</a>
            ·
			<a href="http://meteoarmada.directemar.cl" target="_blank">Meteorología Armada</a>
            ·
			<a href="http://www.conaf.cl" target="_blank">CONAF</a>
            ·
            <a href="http://www.upla.cl/noticias/contactanos/"target="_blank">Contacto</a>
        </p>

        <p class="footer-company-name">Universidad de Playa Ancha  &copy; <?php echo date("Y")?></p>
    </div>

    <div class="footer-center">

        <div>
            <a href="https://goo.gl/phWC7k" target="_blank"> <i class="fa fa-map-marker"></i></a>
            <p><span>Valparaiso - San Felipe</span> Chile</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+56 32 2205100 </p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:comunicaciones@upla.cl">comunicaciones@upla.cl</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>Encuentranos</span>

        </p>

        <div class="footer-icons">

            <a href="https://www.facebook.com/uplacomunica" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/upla_comunica" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="http://www.youtube.com/user/comunicacionesupla" target="_blank"><i class="fa fa-youtube"></i></a>
            <a href="http://uplacomunica.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a>

        </div>

    </div>

</footer>

<?php mysqli_close($con);?>

</body>