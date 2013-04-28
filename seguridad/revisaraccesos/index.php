<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Frecuencia Acceso al Sistema";
include_once("../../cabecerahtml.php");

include_once("../../class/config.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
$config=new configuracion;
$alumno=new alumno;
$curso=new curso;

$cnf=array_shift($config->mostrarConfig("IpInternet"));
$IpInternet=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("PuertoInternet"));
$PuertoInternet=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("UsuarioInternet"));
$UsuarioInternet=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("ContrasenaInternet"));
$ContrasenaInternet=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("BaseDatosInternet"));
$BaseDatosInternet=$cnf['Valor'];

$local=mysql_connect($host,$user,$pass);
mysql_select_db($database,$local);

$inter=mysql_connect($IpInternet.":".$PuertoInternet,$UsuarioInternet,$ContrasenaInternet);
mysql_select_db($BaseDatosInternet,$inter);

$resinter=mysql_query("SELECT *, count(*) as Cantidad  FROM `lograstreo` WHERE `Nivel` IN (6,7) GROUP BY `CodUsuario` ORDER BY count(*) DESC",$inter);


?>
<?php include_once("../../cabecera.php");?>
<div class="container_12" id="cuerpo">
	<div class="prefix_1 grid_10">
    	<div class="titulo corner-top">Frecuencia de Acceso al Sistema</div>
        <div class="cuerpo">
        	<table class="tabla">
            <tr class="cabecera"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td><td>Curso</td><td>Cantidad</td><td>Ultimo Acceso</td></tr>
        	<?php 
			$i=0;
			$cantidad=0;
			while($reginter=mysql_fetch_array($resinter)){
				$cantidad+=$reginter['Cantidad']*2;
				$i++;
				$al=$alumno->mostrarDatos($reginter['CodUsuario']);
				$al=array_shift($al);
				$c=$curso->mostrarCurso($al['CodCurso']);
				$c=array_shift($c);
				$sql="SELECT FechaRegistro,HoraRegistro FROM lograstreo WHERE CodUsuario=".$reginter['CodUsuario']." ORDER BY FechaRegistro DESC";
				$res1=mysql_query($sql,$inter);
				$reg1=mysql_fetch_array($res1);
				?>
                <tr class="contenido">
                	<td><?php echo $i;?></td>
                    <td><?php echo ucwords($al['Paterno'])?></td>
                    <td><?php echo ucwords($al['Materno'])?></td>
                    <td><?php echo ucwords($al['Nombres'])?></td>
                    <td><?php echo $c['Nombre']?></td>
                    <td class="centrar"><?php echo $reginter['Cantidad']*2?></td>
                    <td><?php echo $reg1['FechaRegistro']?> - <?php echo $reg1['HoraRegistro']?></td>
                </tr>
                <?php
			}?>
            <tr><td></td><td></td><td></td><td></td><td></td><td class="centrar"><?php echo $cantidad?></td><td></td></tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include_once("../../footer.php");?>