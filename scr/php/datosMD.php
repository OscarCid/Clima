
<div class='container-fluid'>
    <div class='col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-xs-12 col-sm-12'>
        
           
            <div class="centered-pills" id="pill">
                <ul class="nav nav-tabs navbar-inner" id="datos">
                    <li class="active"><a href="#hoyD" data-toggle="pill">Hoy</a></li>
                    <li><a href="#ayerD" data-toggle="pill">Ayer</a></li>
                    <li><a href="#mesD" data-toggle="pill">Este Mes</a></li>
                </ul>
            </div>
		
	
				<div class="tab-content">
                    <div class="tab-pane active" id="hoyD">
                        <div class="span8">
							<?php
							$estacion = $porciones[2];
							include_once "consultaMD.php";
							include_once "hoy.php";
							?>
						</div>
					</div>		
			
					<div class="tab-pane" id="ayerD">
                        <div class="span8">
							<?php include_once "scr/php/ayer.php";?>
                        </div>
                    </div>
			
					<div class="tab-pane" id="mesD">
                        <div class="span8">
							<?php include_once "scr/php/mes.php";?>

                        </div>
                    </div>
			
			
				</div>
		
	</div>

    <div class='col-md-10 col-md-offset-1'>
        <div class='col-md-6 col-xs-12'>
		<a href='fecha?pag=<?php echo $estacion;?>'>
			<button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-list-alt left' aria-hidden='true'></span>
				Ver datos historicos
			</button>			
		</a>
		</div>
	</div>	
</div>