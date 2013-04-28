<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../db.php");
$l=connect();
$codigo=$_GET['c'];
$sql="SELECT * FROM docente WHERE md5(CodDocente)='$codigo'";
$res=mysql_query($sql);
$reg=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Asignacion Codigo | <?php echo $title?>::.</title>
<link href="../css/960/960.css" rel="stylesheet" type="text/css" />
<link href="../css/core.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/ui/jquery.ui.all.css"/>
<script src="../js/jquery.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<div class="container_12 corner-tl corner-tr " id="cabecera">
	<div class="grid_5"><?php echo $title?> | Asignación Codigo</div>
    <div class="grid_7"><div class="botonessec"><a href="login/salir.php" class="corner-all">Salir</a></div></div>
    <div class="clear"></div>
</div>
<div class="container_12" id="cuerpo">
	<div class="prefix_4 grid_4 suffix_4">
    	
        <div class="title ui-corner-tl ui-corner-tr"><?php echo $reg['Paterno']." ".$reg['Materno']." ".$reg['Nombres']?>
        </div> 
        <div class="cuerpo">
        	<form action="guardarCodigo.php" method="post">
                Codigo:<br />
                <input type="hidden" name="c" value="<?php echo $codigo?>"/>
                <input type="text" autofocus="autofocus" name="codigo"/><br />
                <input type="submit" value="Guardar" class="corner-all"/>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
</body>
</html>