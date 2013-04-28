<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../db.php");
$l=connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Listar Docentes | <?php echo $title?>::.</title>
<link href="../css/960/960.css" rel="stylesheet" type="text/css" />
<link href="../css/core.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/ui/jquery.ui.all.css"/>
<script src="../js/jquery.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<div class="container_12 corner-tl corner-tr " id="cabecera">
	<div class="grid_5"><?php echo $title?> | Listar de Docentes</div>
    <div class="grid_7"><div class="botones"><a href="tarjetero.php" class="corner-all">Marcar Tarjeta</a><a href="registro.php" class="corner-all">Nuevo Docente</a><a href="../login/salir.php" class="corner-all">Salir</a></div></div>
    <div class="clear"></div>
</div>
<div class="container_12" id="cuerpo">
	<div class="grid_12">
    	<table class="table">
        <tr class="titulo"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td><td>Teléfono</td><td>Celular</td><td>Dirección</td><td>Codigo</td><td>Horarios</td></tr>
		<?php
			$sql="SELECT * FROM docente ORDER BY Paterno ASC";
			$res=mysql_query($sql);
			$i=0;
			while($reg=mysql_fetch_array($res)){
				$i++;
				?>
                	<tr class="contenido"><td><?php echo $i;?></span></td><td><?php echo $reg['Paterno'];?></td><td><?php echo $reg['Materno'];?></td><td><?php echo $reg['Nombres'];?></td><td><?php echo $reg['Telefono'];?></td><td><?php echo $reg['Celular'];?></td><td><?php echo $reg['Direccion'];?></td><td width="105"><a href="asignacionCodigo.php?c=<?php echo md5($reg['CodDocente']);?>" class="bEnlace" id="<?php echo $reg['CodDocente'];?>">Asignar Codigo</a></td><td width="115"><a href="asignacionHorario.php?c=<?php echo md5($reg['CodDocente']);?>" class="bEnlace">Asignar Horarios</a></td></tr>
                <?php
			}
		?>  
        </table>
    </div>
    <div class="clear"></div>
</div>
</body>
</html>
<?php
mysql_close($l);
?>