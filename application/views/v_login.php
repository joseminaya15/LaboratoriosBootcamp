<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="HPE Latin America Hybrid IT Bootcamp - January 30th to February 1st, 2018">
    <meta name="keywords"               content="HPE Latin America Hybrid IT Bootcamp">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="January 25, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	<title>HPE Latin America Hybrid IT Bootcamp</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.min.css?v=<?php echo time();?>">
    <style>
        @media ( max-width: 420px ){
            .fondo-imagen{display: none;}
        }
    </style>
</head>
<body>
    <section id="principal">
        <div class="fondo-imagen"></div>
        <div class="card-login">
            <div class="mdl-card mdl-card-login">
                <div class="mdl-card__title">
                    <h2>HPE Latin America Hybrid IT Bootcamp</h2>
                    <p>January 30th to February 1st, 2018</p>
                    <p class="reservation">HPE - LABS Reservation page</p>
                </div>
                <div class="mdl-card__supporting-text">
                    <img class="logo" src="<?php echo RUTA_IMG;?>logo/logo-home.png">
                    <div class="event">
                        <h2>HPE Latin America Hybrid IT Bootcamp</h2>
                        <p>January 30th to February 1st, 2018</p>
                        <p class="reservation">HPE - LABS Reservation page</p>
                    </div>
                    <div class="mdl-input">
                        <div class="mdl-icon">
                            <i class="mdi mdi-email"></i>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="correo" maxlength="50" onkeyup="verificarDatos(event);">
                            <label class="mdl-textfield__label" for="correo">Email</label>
                            <span class="mdl-textfield__error">Invalid email</span>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="ingresar()">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
    </script>
</body>
</html>