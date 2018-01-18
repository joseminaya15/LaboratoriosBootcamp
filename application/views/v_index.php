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
</head>
<body>
    <section id="principal">
        <div class="fondo-imagen"></div>
        <div class="container text-left relative">
            <div class="logo-home">
                <img src="<?php echo RUTA_IMG?>logo/logo-blanco.png">
            </div>
            <div class="nombres">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect close-login" onclick="gotoLogin()">Logout</button>
                <p>Welcome</p>
                <h2><?php echo $nombres.' '.$apellidos ?></h2>
            </div>
            <div class="mdl-calendario">
                <div class="mdl-card mdl-card-fecha mdl-date">
                    <div class="fecha"><label>30 Jan</label></div>
                </div>
                <div class="mdl-card-seats">
                    <?php echo $html ?>
                </div>
            </div>  
            <div class="mdl-calendario">
                <div class="mdl-card mdl-card-fecha mdl-date">
                    <div class="fecha"><label>31 Jan</label></div>
                </div>
                <div class="mdl-card-seats">
                    <?php echo $html1 ?>
                </div>
            </div>
            <div class="mdl-calendario">
                <div class="mdl-card mdl-card-fecha mdl-date">
                    <div class="fecha"><label>01 Feb</label></div>
                </div>
                <div class="mdl-card-seats">
                    <?php echo $html2 ?>
                </div>
            </div>  
        </div>
    </section>
    <!--MODAL-->
    <div class="modal fade" id="ModalThank" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm text-center">
            <div class="modal-content">
                <div class="mdl-card" >
                    <div class="mdl-card__title p-b-0">
                        <h2>Thank you for your reservation</h2>
                    </div>
                    <div class="mdl-card__actions text-right">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="redirectPage()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index.js?v=<?php echo time();?>"></script>
</body>
</html>