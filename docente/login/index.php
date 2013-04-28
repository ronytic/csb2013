<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Acceso al Sistema | Colegio Particular Santa Bárbara::.</title>
<link href="../css/960/960.css" type="text/css" rel="stylesheet" media="all" />
<link href="../css/core.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/login.js"></script>
</head>
<body>
<div class="container_12">
    <div class="prefix_4 grid_4 suffix_4">
		<div id="formLogin" class="corner-all">
        	<div class="title">Acceso al sistema</div>
            <div class="cuerpo">
            	<form action="login.php" method="post" id="login">
               		<input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario"/><br />
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass"/><br />
                    <input type="submit" value="Ingresar"/>
                </form>
            </div>
        </div>    
    </div>
<div class="clear"></div>
</div>
</body>
</html>