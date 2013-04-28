<?php
include_once("../class/config.php");
include_once("../class/anuncioslogin.php");
$anuncioslogin=new anuncioslogin;
$config=new configuracion;
$cnf=array_shift($config->mostrarConfig("Titulo"));
$title=$cnf["Valor"];

$cnf=array_shift($config->mostrarConfig("Sigla"));
$sigla=$cnf['Valor'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Acceso al Sistema | <?php echo $title;?>::.</title>
<link href="../css/960/960.css" type="text/css" rel="stylesheet" media="all" />
<link href="../css/core.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/estilo2.css" type="text/css" rel="stylesheet" media="all" />
<link rel="shortcut icon" href="../images/csb.ico" />
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/login.js"></script>
</head>
<body>
<div class="container_12">
	<div class="omega grid_7">
    	<div class="mensajes">
        	<h2>Comunicados</h2>
            <hr />
            <ul>
        	<?php 
			if (count($anuncioslogin->mostrarAnuncios())>0){
				foreach($anuncioslogin->mostrarAnuncios() as $anuncios){
				?>
                <li class="<?php echo $anuncios['Resaltar']?"resaltargrande":"resaltarpequeno";?>"><?php echo $anuncios['Mensaje']?></li>
                <?php
			}
			}else{
				?>
                <li class="resaltarpequeno">No hay Comunicados</li>
                <?php	
			}?>
            </ul>
        </div>
    </div>
    <div class="prefix_1 grid_4 alpha">
    	<div class="login">
        	<img src="../images/logos/logosantaazul.jpg"  width="50" height="50"/>
            <h4>Unidad Educativa Privada</h4>
            <h2>"SANTA BÁRBARA"</h2>
            <hr />
            	<?php
				if(isset($_GET['incompleto'])){
				?>
            	<div class="rojoC">Por favor introdusca TODOS los DATOS</div>
                <?php
				}
				if(isset($_GET['error'])){
				?>
            	<div class="naranjaC">El USUARIO o la CONTRASEÑA son incorrectos, verifique e intente nuevamente</div>
                <?php
				}
				?>
            	<form action="login.php" method="post" id="login">
               		<input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="campos"/><br />
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass"  class="campos"/><br />
                    <input type="submit" value="Ingresar" class="enviar" />
                </form>
                <a href="#" class="ayuda">¿No puedes acceder al Sistema?</a>
		</div>
    </div>
	<div class="clear"></div>
    <div class="grid_12">
    	<div class="pie">
            <hr />
            Sistema Académico Administrativo <?php echo $sigla;?> &copy; 2011 - <?php echo date("Y");?>
        </div>
    </div>
</div>
</body>
</html>