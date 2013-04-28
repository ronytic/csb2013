<?php
if(!empty($_POST)){
	define("SW","1");
	include_once("../db.php");
	include_once("../config.php");	
	include_once("fn.tarjetero.php");
	$l=connect();
	$codigoBarra=$_POST['codBarra'];
	//Verifica Codigo Existente del Docente
	$sqlVerificaDocente="SELECT count(*) as cantidad,`CodDocente`,`Paterno`,`Materno` ,`Nombres`,Sexo FROM docente WHERE codBarra='$codigoBarra'";
	$reg=mysql_fetch_array(mysql_query($sqlVerificaDocente));
	if($reg['cantidad']==1){
		//inicializamos variables
		$codDocente=$reg['CodDocente'];
		$diaActual=date("w");
		$horaActual=date('H:i:s');
		$dia=date('Y-m-d');
		$hora=date('H:i:s');
		$turno="";
		$observacion="";
		$tipo="";
		$saludo="";
		if(date('a')=="am"){$turno="M";$saludo.="Buenos Dias, ";}else{$turno="T";$saludo.="Buenas Tardes, ";}
		if($reg['Sexo']==1){$saludo.="Profesor ";}else{$saludo.="Profesora ";}
		$periodoActual=convertirPeriodo($horaActual);
		//Verificamos si el docente viene hoy y es su periodo
		$sqlVerificaAsignacion="SELECT count(*) as cantidad, Periodo, Dia FROM asignacionhorariodocente WHERE CodDocente=$codDocente and Dia=$diaActual and Periodo=$periodoActual ORDER BY Periodo";
		$res=mysql_query($sqlVerificaAsignacion);
		$asignacionHoy=mysql_fetch_array($res);
		if($asignacionHoy['cantidad']==1 && $asignacionHoy['Periodo']==$periodoActual){
			//Si tiene periodo 
			$sqlAsistenciaDocente="SELECT count(*) as cantidad FROM asistenciadocentes WHERE CodDocente=$codDocente and Dia='$dia'";
			$cantidadAsistencia=mysql_fetch_array(mysql_query($sqlAsistenciaDocente));
			if($cantidadAsistencia['cantidad']%2==0){
				$tipo="E";
			}else{
				$tipo="S";	
			}
			$observacion=verificaObservacionDocente($horaActual,$periodoActual);
			echo $dia." ".$hora." ".$turno." ".$tipo." ".$observacion;
			mysql_query("INSERT INTO asistenciadocentes VALUES(NULL,$codDocente,'$dia','$hora','$turno','$observacion','$tipo')");
			$saludo.=$reg['Nombres']." ".$reg['Paterno'];
			audio(urlencode($saludo));
		}else{
			//si no tiene periodo hoy ExTRAS
			echo "asd";	
		}
		
				
	}else{
		//echo "Hola";	
	}
	mysql_close($l);
}


?>
<!--<audio autoplay="autoplay">
	<source src="http://translate.google.com/translate_tts?ie=UTF-8&q=Buenos%20Dias%2C%20Almir%20Sosa%20%0A&tl=es&prev=input" type="audio/mpeg" />
</audio>-->

