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
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.min.css?v=<?php echo time();?>">
</head>
<body>
    <section id="principal">
        <div class="fondo-imagen"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                      <input type="text" class="form-control" id="buscador" placeholder="Search for..." maxlength="100">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button" onclick="buscar()">Go!</button>
                      </span>
                    </div>
                  </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <select class="selectpicker" id="fecha" onchange="cambiarFecha()" title="Seleccione una fecha">
                            <option value="">Seleccione una fecha</option>
                            <option value="2018-01-15">2018-01-15</option>
                            <option value="2018-01-16">2018-01-16</option>
                            <option value="2018-01-17">2018-01-17</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <select class="selectpicker" id="evento" onchange="cambiarEvento()" title="Seleccione un Evento">
                            <option value="">Seleccione una Evento</option>
                            <option value="LAB (nimble)">LAB (nimble)</option>
                            <option value="LAB (DAPR)">LAB (DAPR)</option>
                            <option value="LAB (simplivity)">LAB (simplivity)</option>
                            <option value="VMWare - HIT Mgmnt">VMWare - HIT Mgmnt</option>
                            <option value="Brocade - HIT Mgmnt">Brocade - HIT Mgmnt</option>
                            <option value="3PAR Competitive Lab">3PAR Competitive Lab</option>
                            <option value="Veeam - HIT Mgmnt">Veeam - HIT Mgmnt</option>
                            <option value="Scality - HIT Mgmnt">Scality - HIT Mgmnt</option>
                        </select>
                    </div>
                </div>
            </div>
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Pa&iacute;</th>
                        <th>Correo electr&oacute;nico</th>
                        <th>Fecha de evento</th>
                        <th>Nombre de evento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $html ?>
                </tbody>
            </table>
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
    <script src="<?php echo RUTA_JS?>admin.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
    </script>
</body>
</html>