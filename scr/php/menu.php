<?php require_once("scr/php/login/myDBC.php"); ?>
<script type="text/javascript" src="scr/js/jquery.Rut.js" ></script>
<script type="text/javascript" src="scr/js/validator.js" ></script>
<style>body { padding-top: 70px}

#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0    
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}

@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #333;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
}

</style>

<script>
	$(document).ready(function(){
		$('#login-nav').validator();
		$('#rut').Rut();
	});
</script>
<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index" target="_blank"><img alt="" src="scr/img/logo_met.png" height="25px"></a>
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

                </ul>
				

	<ul class="nav navbar-nav navbar-right">			
<?php 
	if(isset($_SESSION['session']))
		{
			
		echo '<li style="padding-left:15px; padding-right:15px"><p class="navbar-text"><strong>Bienvenido </strong>'.$_SESSION['username'].'</p></li>
		<li style="padding-right:15px"><p class="navbar-text"><strong><a href="scr/php/login/salir.php">Logout</a></strong></p></li>';
		}else{	

	
echo'	<li style="padding-left:15px"><p class="navbar-text">Ya estas registrado?</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Ingresar 
								 <form class="form" role="form" method="post" action="scr/php/login/login.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" >usuario</label>
											 <input id="rut" type="text" class="form-control" pattern="[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9Kk]{1}" name="rut" autofocus="" required="" value="" placeholder="rut">
										</div>
										<div class="form-group">
											 <label class="sr-only">contraseña</label>
											 <input id="login-password" type="password" class="form-control" name="password" required="" placeholder="contraseña">
                                             
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-success btn-block">Entrar</button>
										</div>
									
								 </form>
							</div>
							<div class="bottom text-center">
								No tienes cuenta <a href="registro" ><b>Registrate</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>';
 } ?>		
    </ul>
			
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

