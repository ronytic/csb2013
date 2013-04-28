<?php
mysql_connect("localhost","root","");
mysql_select_db("backcsb2012");
/*$res=mysql_query("SELECT  * FROM cuota WHERE YEAR(Fecha)='0000' or YEAR(Fecha)='1969'");
while($reg=mysql_fetch_array($res)){
	echo $reg['CodAlumno']." - ".$reg['Numero']." - ".$reg['Fecha'];
	$ral=mysql_fetch_array(mysql_query("SELECT * FROM alumno WHERE CodAlumno={$reg['CodAlumno']}"));
	 $Fecha=$ral['FechaIns']." ".$ral['HoraIns'];
	echo " - "; echo $Fecha;
	$cons="UPDATE cuota SET Fecha='$Fecha' WHERE CodCuota={$reg['CodCuota']}";
	echo "<br>";echo $cons;echo "<br><br>";
//	mysql_query($cons); //actualiza campos con fecha validas
	
}*/
/*$res=mysql_query("SELECT  * FROM cuota WHERE Factura!='' and Cancelado=0");
while($reg=mysql_fetch_array($res)){
	echo $reg['CodCuota']."<br>";
	$cons="UPDATE cuota SET Cancelado=1 WHERE CodCuota={$reg['CodCuota']}";
	echo $cons."<br>";
//	mysql_query($cons); //actualiza lo campos pagados con 1
}*/
/*	$res=mysql_query("SELECT  * FROM alumno WHERE MontoBeca!=0 ORDER BY CodCurso");
	echo "<table border=1>";
while($reg=mysql_fetch_array($res)){
	$cu=mysql_fetch_array(mysql_query("SELECT * FROM cuota WHERE Numero=1 and CodAlumno={$reg['CodAlumno']}"));
	if($reg['CodCurso']==1){$cantidad=239;}else{$cantidad=294;}
	$can=$cantidad-$reg['MontoBeca'];
	$const="UPDATE cuota SET MontoPagar='$can' WHERE Numero=1 and CodAlumno={$reg['CodAlumno']}";
	echo "<tr>";
	echo "<td>".$reg['CodAlumno']."";
	echo "<td>".$reg['Paterno']." ";
	echo "<td>".$reg['Materno']." ";
	echo "<td>".$reg['Nombres']." ";
	echo "<td>".$reg['CodCurso']." ";
	echo "<td>Monto de la Beca:".$reg['MontoBeca']." ";
	
	echo "<td>Ope:".$cantidad." - ".$reg['MontoBeca'];
	echo "<td>Monto PagarCuota:".$cu['MontoPagar']."";
	echo "<td>Cantidad calculada:".$can." ";
	echo "<td>".$const." ";
	echo "</tr>";
	


//	mysql_query($const); //montos de pagos en las cuotas a pagas
}*/
$res=mysql_query("Select c.*, a.CodCurso from Cuota c, alumno a WHERE c.MontoPagar!=239 and c.MontoPagar!=294 and c.Numero!=1 and c.CodAlumno=a.CodAlumno");
while($reg=mysql_fetch_array($res)){
	//echo $reg['CodCuota']."<br>";
	if($reg['CodCurso']==1)
		$c=239;
	else
		$c=294;
	$cons="UPDATE cuota SET MontoPagar='$c' WHERE CodCuota={$reg['CodCuota']}";
	echo $cons."<br>";
//	mysql_query($cons); //actualiza lo campos pagados con 1
}
?>