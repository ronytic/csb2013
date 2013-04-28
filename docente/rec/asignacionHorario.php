<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../db.php");
$l=connect();

if (!$_GET[dia])
{
 $sql="SELECT CodDocente,Paterno,Materno,Nombres FROM docente WHERE Observacion='0'";
 $res=mysql_query($sql);
 echo "<table border='1'> <tr><td>Paterno</td><td>Materno</td><td>Nombres</td>";
     while($fila=mysql_fetch_array($res))
     {
	 echo "<tr><td>".utf8_decode($fila[Paterno])."</td><td>$fila[Materno]</td><td>". utf8_decode($fila[Nombres])."</td><td><a href='asignacionHorario.php?dia=1&CodDocente=$fila[CodDocente]'>asignar</a></td></tr>";
	 }
	 echo "</table>";
}


if($_GET[dia]==1)
{
	
	$CodDocente=$_GET[CodDocente];
    $sql="SELECT CodDocente,Paterno,Materno,Nombres FROM docente WHERE CodDocente=$CodDocente";
	$resul=mysql_query($sql);
	$fila=mysql_fetch_array($resul);
	echo "<h2>";
	echo "Prof. ".utf8_decode($fila[Paterno])." ".utf8_decode($fila[Materno])." ".utf8_decode($fila[Nombres]);
	echo " ";
	echo "<br>LUNES</h2>";
	echo "<form action='asignacionHorario.php' method='get'>";
	echo "<table> <tr><td colspan='2'>".utf8_decode("Mañana")."</td><td></td><td colspan='2'>Tarde</td></tr>";
	echo "<tr><td >Entrada</td><td>Salida</td><td></td><td >Entrada</td><td>Salida</td></tr>";
	echo "<tr><td ><input name='en1'></td><td><input name='sa1'></td><td>-----------</td><td ><input name='en2'></td><td><input name='sa2'></td></tr>";
	echo "<tr><td colspan='4'><input type='submit' value='Registrar HORARIO DEL DIA'></td></tr>";
	echo "</table>";
	echo "<input type='hidden' name='dia' value='2'>";
	echo "<input type='hidden' name='CodDocente' value='$fila[CodDocente]'>";
	echo "</form>";
	}
	
if($_GET[dia]==2)
{   $CodDocente=$_GET[CodDocente];
	$en1=$_GET[en1];
	$sa1=$_GET[sa1];
	$en2=$_GET[en2];
	$sa2=$_GET[sa2];
	$dia=date("w");
	$registra="INSERT INTO horariosdocentes values(NULL, $CodDocente,'$en1','$sa1','$en2','$sa2',1);";
	mysql_query($registra);
    $sql="SELECT CodDocente,Paterno,Materno,Nombres FROM docente WHERE CodDocente=$CodDocente";
	$resul=mysql_query($sql);
	$fila=mysql_fetch_array($resul);
	echo "<h2>";
	echo "Prof. ".utf8_decode($fila[Paterno])." ".utf8_decode($fila[Materno])." ".utf8_decode($fila[Nombres]);
	echo " ";
	echo "<br>MARTES</h2>";
	echo "<form action='asignacionHorario.php' method='get'>";
	echo "<table> <tr><td colspan='2'>".utf8_decode("Mañana")."</td><td></td><td colspan='2'>Tarde</td></tr>";
	echo "<tr><td >Entrada</td><td>Salida</td><td></td><td >Entrada</td><td>Salida</td></tr>";
	echo "<tr><td ><input name='en1'></td><td><input name='sa1'></td><td>-----------</td><td ><input name='en2'></td><td><input name='sa2'></td></tr>";
	echo "<tr><td colspan='4'><input type='submit' value='Registrar HORARIO DEL DIA'></td></tr>";
	echo "</table>";
	echo "<input type='hidden' name='dia' value='3'>";
	echo "<input type='hidden' name='CodDocente' value='$fila[CodDocente]'>";
	echo "</form>";
	}
if($_GET[dia]==3)
{
	$CodDocente=$_GET[CodDocente];
	$en1=$_GET[en1];
	$sa1=$_GET[sa1];
	$en2=$_GET[en2];
	$sa2=$_GET[sa2];
	$dia=date("w");
	$registra="INSERT INTO horariosdocentes values(NULL, $CodDocente,'$en1','$sa1','$en2','$sa2',2);";
	mysql_query($registra);
    $sql="SELECT CodDocente,Paterno,Materno,Nombres FROM docente WHERE CodDocente=$CodDocente";
	$resul=mysql_query($sql);
	$fila=mysql_fetch_array($resul);
	echo "<h2>";
	echo "Prof. ".utf8_decode($fila[Paterno])." ".utf8_decode($fila[Materno])." ".utf8_decode($fila[Nombres]);
	echo " ";
	echo "<br>MIERCOLES</h2>";
	echo "<form action='asignacionHorario.php' method='get'>";
	echo "<table> <tr><td colspan='2'>".utf8_decode("Mañana")."</td><td></td><td colspan='2'>Tarde</td></tr>";
	echo "<tr><td >Entrada</td><td>Salida</td><td></td><td >Entrada</td><td>Salida</td></tr>";
	echo "<tr><td ><input name='en1'></td><td><input name='sa1'></td><td>-----------</td><td ><input name='en2'></td><td><input name='sa2'></td></tr>";
	echo "<tr><td colspan='4'><input type='submit' value='Registrar HORARIO DEL DIA'></td></tr>";
	echo "</table>";
	echo "<input type='hidden' name='dia' value='4'>";
	echo "<input type='hidden' name='CodDocente' value='$fila[CodDocente]'>";
	echo "</form>";
	}
if($_GET[dia]==4)
{
	$CodDocente=$_GET[CodDocente];
	$en1=$_GET[en1];
	$sa1=$_GET[sa1];
	$en2=$_GET[en2];
	$sa2=$_GET[sa2];
	$dia=date("w");
	$registra="INSERT INTO horariosdocentes values(NULL, $CodDocente,'$en1','$sa1','$en2','$sa2',3);";
	mysql_query($registra);
    $sql="SELECT CodDocente,Paterno,Materno,Nombres FROM docente WHERE CodDocente=$CodDocente";
	$resul=mysql_query($sql);
	$fila=mysql_fetch_array($resul);
	echo "<h2>";
	echo "Prof. ".utf8_decode($fila[Paterno])." ".utf8_decode($fila[Materno])." ".utf8_decode($fila[Nombres]);
	echo " ";
	echo "<br>JUEVES</h2>";
	echo "<form action='asignacionHorario.php' method='get'>";
	echo "<table> <tr><td colspan='2'>".utf8_decode("Mañana")."</td><td></td><td colspan='2'>Tarde</td></tr>";
	echo "<tr><td >Entrada</td><td>Salida</td><td></td><td >Entrada</td><td>Salida</td></tr>";
	echo "<tr><td ><input name='en1'></td><td><input name='sa1'></td><td>-----------</td><td ><input name='en2'></td><td><input name='sa2'></td></tr>";
	echo "<tr><td colspan='4'><input type='submit' value='Registrar HORARIO DEL DIA'></td></tr>";
	echo "</table>";
	echo "<input type='hidden' name='dia' value='5'>";
	echo "<input type='hidden' name='CodDocente' value='$fila[CodDocente]'>";
	echo "</form>";
	}
if($_GET[dia]==5)
{  $CodDocente=$_GET[CodDocente];
	$en1=$_GET[en1];
	$sa1=$_GET[sa1];
	$en2=$_GET[en2];
	$sa2=$_GET[sa2];
	$dia=date("w");
	$registra="INSERT INTO horariosdocentes values(NULL, $CodDocente,'$en1','$sa1','$en2','$sa2',4);";
	mysql_query($registra);
    $sql="SELECT CodDocente,Paterno,Materno,Nombres FROM docente WHERE CodDocente=$CodDocente";
	$resul=mysql_query($sql);
	$fila=mysql_fetch_array($resul);
	echo "<h2>";
	echo "Prof. ".utf8_decode($fila[Paterno])." ".utf8_decode($fila[Materno])." ".utf8_decode($fila[Nombres]);
	echo " ";
	echo "<br>VIERNES</h2>";
	echo "<form action='asignacionHorario.php' method='get'>";
	echo "<table> <tr><td colspan='2'>".utf8_decode("Mañana")."</td><td></td><td colspan='2'>Tarde</td></tr>";
	echo "<tr><td >Entrada</td><td>Salida</td><td></td><td >Entrada</td><td>Salida</td></tr>";
	echo "<tr><td ><input name='en1'></td><td><input name='sa1'></td><td>-----------</td><td ><input name='en2'></td><td><input name='sa2'></td></tr>";
	echo "<tr><td colspan='4'><input type='submit' value='Registrar HORARIO DEL DIA'></td></tr>";
	echo "</table>";
	echo "<input type='hidden' name='dia' value='6'>";
	echo "<input type='hidden' name='CodDocente' value='$fila[CodDocente]'>";
	echo "</form>";
	}
if($_GET[dia]==6)
{
	$CodDocente=$_GET[CodDocente];
	$en1=$_GET[en1];
	$sa1=$_GET[sa1];
	$en2=$_GET[en2];
	$sa2=$_GET[sa2];
	$dia=date("w");
	$registra="INSERT INTO horariosdocentes values(NULL, $CodDocente,'$en1','$sa1','$en2','$sa2',5);";
	mysql_query($registra);
	
    $sql="SELECT CodDocente,Paterno,Materno,Nombres FROM docente WHERE CodDocente=$CodDocente";
	$resul=mysql_query($sql);
	$fila=mysql_fetch_array($resul);
	echo "<h2>";
	echo "Prof. ".utf8_decode($fila[Paterno])." ".utf8_decode($fila[Materno])." ".utf8_decode($fila[Nombres]);
	echo " ";
	echo "<br>SABADO</h2>";
	echo "<form action='asignacionHorario.php' method='get'>";
	echo "<table> <tr><td colspan='2'>".utf8_decode("Mañana")."</td><td></td><td colspan='2'>Tarde</td></tr>";
	echo "<tr><td >Entrada</td><td>Salida</td><td></td><td >Entrada</td><td>Salida</td></tr>";
	echo "<tr><td ><input name='en1'></td><td><input name='sa1'></td><td>-----------</td><td ><input name='en2'></td><td><input name='sa2'></td></tr>";
	echo "<tr><td colspan='4'><input type='submit' value='Registrar HORARIO DEL DIA'></td></tr>";
	echo "</table>";
	echo "<input type='hidden' name='dia' value='7'>";
	echo "<input type='hidden' name='CodDocente' value='$fila[CodDocente]'>";
	echo "</form>";
	}
if($_GET[dia]==7)
{
	$CodDocente=$_GET[CodDocente];
	$en1=$_GET[en1];
	$sa1=$_GET[sa1];
	$en2=$_GET[en2];
	$sa2=$_GET[sa2];
	$dia=date("w");
	$registra="INSERT INTO horariosdocentes values(NULL, $CodDocente,'$en1','$sa1','$en2','$sa2',6);";
	mysql_query($registra);
	echo "HORARIOS TERMINADOS PARA ESTE DOCENTE.";
	mysql_query("UPDATE docente set Observacion='1' WHERE CodDocente=$CodDocente");
	echo "<br> <a href='asignacionHorario.php'>VOLVER A LISTA DE DOCENTES</a>";
}
?>



















              
        	    
</body>
</html>