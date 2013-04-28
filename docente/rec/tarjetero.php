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
<title>.::Sistema de Control de Asistencia No Evita Retrasos SCANER| <?php echo $title?>::.</title>
<link href="../css/960/960.css" rel="stylesheet" type="text/css" />
<link href="../css/core.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/ui/jquery.ui.all.css"/>
<link rel="stylesheet" type="text/css" href="css/tarjetero.css"/>
<script src="../js/jquery.js" type="text/javascript" language="javascript"></script>
<script language="javascript" type="text/javascript">
var HoraTotal='<?php echo date("d M Y G:i:s"); ?>'
var fecha=new Date(HoraTotal);
</script>
<script src="js/tarjetero.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<div class="container_12 corner-tl corner-tr " id="cabecera">
	<div class="grid_7"><?php echo $title?> | Sistema de Control de Asistencia - SCANER</div>
    <div class="grid_5"><div class="botonessec"><a href="../login/salir.php" class="corner-all">Salir</a></div></div>
    <div class="clear"></div>
</div>
<div class="container_12" id="cuerpo">
	<div class="grid_12" id="turno">
   	 TURNO:<?php $hora=date("a");if($hora=="am"){echo "MAÑANA";}else{echo "TARDE";}?>
    </div>
    <div class="clear"></div>
    <div class="grid_12 corner-all"  id="hora">
    </div>
    <div class="clear"></div>
    <div class="prefix_4 grid_4">
    	<div class="title corner-tl corner-tr">
        	Ingrese Codigo de Barra
        </div>
        <div class="cuerpo">
   

			<audio autoplay="autoplay">
		
</audio>


        	<form method="post" action="marcarTarjeta2.php" id="tarjetero">
                    <label for="CodBarra">Usuario:</label><br />
                    <input type="password" size="6"  name="CodBarra" id="CodBarra" class="corner-all" autofocus="autofocus" x-webkit-speech=""/><br />
                    <input type="submit" value="Revisar" />
            </form>
		</div>
    </div>
    <div class="grid_4" id="respuesta">
        	
    </div>
    <div class="clear"></div>
</div>
</body>
</html>