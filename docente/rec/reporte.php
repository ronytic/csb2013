<?php
include_once("../config.php");
include_once("../login/check.php");
include_once("../db.php");
$l=connect();
$dia=date("Y-m-d");
$sql="SELECT asisd.*,d.Nombres,d.Paterno,d.Materno FROM asistenciadocentes asisd,docente d WHERE asisd.Dia='$dia' and asisd.`CodDocente`=d.`CodDocente` and Tipo!='' ORDER BY d.Paterno,d.Materno,asisd.Hora";
$res=mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de Asistencia Docente | <?php echo $title;?></title>
<link href="../css/960/960.css" rel="stylesheet" type="text/css" />
<link href="../css/core.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/ui/jquery.ui.all.css"/>
</head>
<body>
<div class="container_12 corner-tl corner-tr " id="cabecera">
	<div class="grid_7"><?php echo $title?> | Sistema de Control de Asistencia - SCANER</div>
    <div class="grid_5"><div class="botonessec"><a href="../login/salir.php" class="corner-all">Salir</a></div></div>
    <div class="clear"></div>
</div>
<div class="container_12" id="cuerpo">
	<div class="grid_6">
    <div class="title">
    	LISTA DE DOCENTE INGRESO
    </div>
    <div class="cuerpo">
    <table class="table">
    	<tr class="titulo"><td>Nro</td><td>Paterno</td><td>Materno</td><td>Nombres</td><td>Turno</td><td>Hora</td><td>Entrada</td></tr>
        <?php
		$i=0;
		while($reg=mysql_fetch_array($res)){
			$i++;
			if($reg['Turno']=="M")$turno="Mañana"; else $turno="Tarde";
			if($reg['Tipo']=="E")$tipo='<li class="ui-state-default ui-corner-all sinlista" title="Entrada"><span class="ui-icon ui-icon-circle-check"></span></li>'; else $tipo="";
			?>
            <tr class="contenido"><td><?php echo $i;?></td><td><?php echo mb_strtolower($reg['Paterno'],"utf-8");?></td><td> <?php echo mb_strtolower($reg['Materno'],"utf-8");?></td><td><?php echo mb_strtolower($reg['Nombres'],"utf-8");?> </td><td><?php echo $turno;?></td><td><?php echo $reg['Hora'];?></td><td><?php echo $tipo;?></td></tr>            <?php
		}
		?>
    </table>
    </div>
    </div>
    <div class="clear"></div>
</div>
</body>
</html>