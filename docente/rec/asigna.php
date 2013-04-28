<?php
include_once("../db.php");
$l=connect();
$CodBarra=$_POST[CodBarra];
$sql="SELECT CodDocente FROM docente WHERE codBarra='$CodBarra'";
$res=mysql_query($sql);
if($reg=mysql_fetch_array($res))
{
$CodDocente=$reg[CodDocente];
$CodBarra=$_POST[CodBarra];
$dia=date("w");
$tipo=$_POST[tipo];	
$hora=date("H:i:s");
$mes=date("m");
$diam=date("d");
///
	if( strtotime($hora)<strtotime("13:40"))
	{
	$turno="M";
	echo "TURNO MAÑANA<br/>";
	}
	else
	{
	$turno="T";
		echo "TURNO tarde<br/>";
	}
///
if($tipo=="S")
{
	 $sqldd="SELECT CodDocente, Hora,diam, Tipo FROM  listadocente l, docente d WHERE diam='$diam' and mes='$mes' and CodDocente=$CodDocente ORDER BY l.Hora DESC";
		$ress2=mysql_query($sqldd);
	$ffi=mysql_fetch_array($ress2);
		  if($ffi[Tipo]!='S')
		  {
			$sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'S','N','$hora', '$mes','$diam');";
				 mysql_query($sqlf);
          }	
	 	echo "tipo enviado:SALIDA<br/>";
}
else
{
//verificamos si ya entro

	$sql="SELECT CodDocente, Tipo, Hora FROM listadocente WHERE Coddocente=$CodDocente and diam='$diam' and mes='$mes'  ORDER BY Hora DESC";
	$res=mysql_query($sql);
	$f=mysql_fetch_array($res);
	echo "El docente ".$f[Tipo]." a las ".$f[Hora]."<br>";
	
	
	
//inicio de iffs
    if($f[Tipo]=='S' or !$f[Tipo])//si el ultimo registro de hoy es salida  S
	{
			if( strtotime($hora)<strtotime("13:40"))
			{//turno mañana
				//obtenemos su horario
				 $sql="SELECT Dia, CodDocente, En1,Sa1 FROM horariosdocentes WHERE CodDocente=$CodDocente and Dia=$dia ";
				 $resu=mysql_query($sql);
				 if($fila=mysql_fetch_array($resu))
				 {
					$horaentrada=$fila[En1];
					 if($horaentrada!="00:00:00")//osea pasa clases en ese horario
					 {echo "tiene clases a las $horaentrada <br>";
							  if(strtotime($hora)<strtotime($horaentrada))//osea esta a tiempo?
							  {
							  $sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'E','N','$hora', '$mes','$diam');";
							  mysql_query($sqlf);
							  }
							  else
					          {
							  $sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'E','A','$hora', '$mes','$diam');";
							  mysql_query($sqlf);
							  }
				     }
				     else
				     {
						$sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'E','E','$hora', '$mes','$diam');";
						mysql_query($sqlf);
					 }
				 }
			}
		    else//turno tarde
		    {
				$sql="SELECT Dia, CodDocente, En2,Sa2 FROM horariosdocentes WHERE CodDocente=$CodDocente and Dia=$dia ";
				$resu=mysql_query($sql);
				    if($fila=mysql_fetch_array($resu))
				    {
					  $horaentrada=$fila[En2];
					  ////////////
						if($horaentrada!="00:00:00")//si la hora de entrada es distinto de cero, osea pasa clases en ese horario
					    {
							  if(strtotime($hora)<strtotime($horaentrada))//osea esta a tiempo?
							  {
							  $sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'E','N','$hora', '$mes','$diam');";
							  mysql_query($sqlf);
							  }
							  else
					          {
							  $sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'E','A','$hora', '$mes','$diam');";
							  mysql_query($sqlf);
							  }
				        }
				        else
				        {
						$sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'E','E','$hora', '$mes','$diam');";
						mysql_query($sqlf);
					    }
						//////////
 	   			   }
	
		    }
		
//fin de los iffs


	echo "  registro realizado con exito";
   


	}
	else// si el ultimo registro de hoy no es salida entonces
	{
		$err="1";	
	}
 }	
}
?>
<script language="javascript">
location.href="tarj.php?nombre=ds&<?php if($err){echo "error=$err";}?>";
</script>