<?php
include_once("../configuracion.php");
$folder="../";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title><?php echo $tituloSistema?></title>

    <link rel="shortcut icon" type="image/ico" href="../imagenes/icono.jpg" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo $folder?>css/core/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/animate.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/bootstrap/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo $folder?>css/core/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/helper.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/style.css">

</head>
<body class="blank">


<div class="login-container">
    <div class="row">
        <div class="col-md-12">

            <div class="hpanel">
                <div class="panel-body">
                <div class="text-center m-b-md">
                <img src="../imagenes/logo/logo.png" alt="">
                <!-- <h3><?php echo $tituloSistema?></h3> -->
                <small><?php echo $lemaSistema?></small>
            </div>
                        <?php if(isset($_GET['error'])){?>
                        <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <small>Los datos Introducidos son erroneos.</small>
                        </div>
                        <?php }?>
                        <?php if(isset($_GET['incompleto'])){?>
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <small>Los datos Introducidos estan incompletos.</small>
                        </div>
                        <?php }?>
                        <form action="login.php" id="loginForm" method="post">
                        <input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                            <div class="form-group">
                                <label class="control-label" for="username">Usuario</label>
                                <input type="text" placeholder="Introduce tu usuario" title="Introduce tu usuario" required="" value="" name="usuario" id="usuario" class="form-control" autofocus>

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" title="Introduce tu contraseña" placeholder="******" required="" value="" name="pass" id="pass" class="form-control">

                            </div>

                            <button class="btn btn-success btn-block">Ingresar</button>

                        </form>
                        <br>
                        <div class="col-md-12 text-center">
                        <small><strong>&copy; Todos los Derechos Reservados <?php echo date("Y");?></small>
                            <!--<br> Sistema Realizado por <a href="http://fb.com/ronaldnina/" target="_blank">Ronald Nina Layme</a>--></strong>
                        </div>

                </div>
            </div>
        </div>
    </div>

</div>


<!-- Vendor scripts -->
<script src="<?php echo $folder?>js/core/jquery.min.js"></script>
<script src="<?php echo $folder?>js/core/jquery-ui.min.js"></script>
<script src="<?php echo $folder?>js/core/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $folder?>js/core/bootstrap.min.js"></script>
<script src="<?php echo $folder?>js/core/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo $folder?>js/core/icheck.min.js"></script>
<script src="<?php echo $folder?>js/core/sparkline/index.js"></script>

<!-- App scripts -->
<script src="<?php echo $folder?>js/core/homer.js"></script>
<script src="js/login.js"></script>

</body>


</html>