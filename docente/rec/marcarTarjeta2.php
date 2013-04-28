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
		$observacion="N";
		$tipo="";
		$saludo="";
		if(date('a')=="am"){$turno="M";$saludo.="Buenos Dias, ";}else{$turno="T";$saludo.="Buenas Tardes, ";}
		if($reg['Sexo']==1){$saludo.="Profesor ";}else{$saludo.="Profesora ";}
		//$periodoActual=convertirPeriodo($horaActual);
		//Verificamos si el docente viene hoy y es su periodo
			//Si tiene periodo 
			$sqlAsistenciaDocente="SELECT count(*) as cantidad FROM asistenciadocentes WHERE CodDocente=$codDocente and Dia='$dia'";
			$cantidadAsistencia=mysql_fetch_array(mysql_query($sqlAsistenciaDocente));
			if($cantidadAsistencia['cantidad']%2==0){
				$tipo="E";
			}else{
				$tipo="S";	
			}
			//$observacion=verificaObservacionDocente($horaActual,$periodoActual);
			//echo $dia." ".$hora." ".$turno." ".$tipo." ".$observacion;
			
			mysql_query("INSERT INTO asistenciadocentes VALUES(NULL,$codDocente,'$dia','$hora','$turno','$observacion','$tipo')");
			$saludo.=$reg['Nombres']." ".$reg['Paterno'];
			audio(urlencode($saludo));
			?>
			<div class="nombre"><?php echo $saludo;?></div>   	
			<div class="msg"><?php echo "SU ASISTENCIA SE MARCO CORRECTAMENTE";?></div>
            <div class="turno"><?php if($tipo=="E")echo "ENTRADA";else echo "SALIDA";?></div>
			<?php
		}else{
			//si no tiene periodo hoy ExTRAS
			?><div><?php echo "NO EXISTE EL CODIGO DE BARRA O DOCENTE";?></div><?php	
		}
		

	mysql_close($l);
}


?>


