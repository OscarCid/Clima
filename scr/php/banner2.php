<div class="row" style="padding-bottom: 10px;">
    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 " style=" padding-bottom: 7px; border-bottom: 1px solid #eee">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <a href="http://www.upla.cl/facultadingenieria"  target="_blank"><img src="scr/img/uplafi.png" class="img-responsive"/></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <a href="http://meteoarmada.directemar.cl"  target="_blank"><img src="scr/img/armada.png" class="img-responsive"/></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <a href="http://www.conaf.cl"  target="_blank"><img src="scr/img/conaf.png" class="img-responsive"/></a>
        </div>
    </div>
</div>
<?php
if(isset($_SESSION['session']))
{
?>
<div class="row" style="padding-top: 10px">
<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 ">
	<div class="col-md-8 col-xs-4 "></div>
	<div class="col-md-4 col-xs-8 text-right ">
		<a href="Android/Meteorologia-UPLA.apk" class="btn btn-success" role="button"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Descarga Android</a>
	</div>
</div>
</div>
<?php } ?>