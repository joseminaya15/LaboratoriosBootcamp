<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Proyecto de desarrollo de un producto wizard online que tenga un quiz y con una unica solucion que es SAP Business One">
    <meta name="keywords"               content="SAP,producto wizard">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="January 25, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	<title>Laboratorios Bootcamp</title>
    <!-- <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.png"> -->
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.indigo.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>engagement.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
</head>
<body>
    <section id="principal">
        <div class="fondo-imagen"></div>
        <div class="card-login">
            <div class="mdl-card mdl-card-login">
            	<h2 style="color: #fff;">Bienvenido al evento <?php echo $nombres ?></h2>
            </div>
            <h2 style="color: #fff;"><?php echo $fecha ?></h2>
            <div class="col-xs-12 cards">
            	<?php echo $html ?>
            </div> 
            <h2 style="color: #fff;">2018-01-16</h2>
            <div class="col-xs-12 cards2">
            	<?php echo $html ?>
            </div>   
            <h2 style="color: #fff;">2018-01-17</h2>
            <div class="col-xs-12 cards2">
            	<?php echo $html ?>
            </div>       
        </div>
    </section>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        initButtonCalendarDaysMaxToday('fechaNac');
        initMaskInputs('fechaNac');
    </script>
</body>
</html>