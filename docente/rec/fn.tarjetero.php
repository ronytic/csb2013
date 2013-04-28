<?php
defined("SW") or die("Prohibido");
function convertirPeriodo($hora){
		global $tipoHoraC;
		$hora=strtotime($hora);
		$sql="SELECT * FROM horas WHERE TipoHora='$tipoHoraC' ";
		$reg=mysql_fetch_array(mysql_query($sql));
		$periodo=0;
		if(modificaHora($reg['P1E'],"+0","-30","+0")<=$hora && $hora<=modificaHora($reg['P1E'],"+0","+30","+0")){
			$periodo=1;
		}
		if(modificaHora($reg['P2E'],"+0","-30","+0")<=$hora && $hora<=modificaHora($reg['P2E'],"+0","+30","+0")){
			$periodo=2;
		}
		if(modificaHora($reg['P3E'],"+0","-30","+0")<=$hora && $hora<=modificaHora($reg['P3E'],"+0","+30","+0")){
			$periodo=3;
		}
		if(modificaHora($reg['P4E'],"+0","-30","+0")<=$hora && $hora<=modificaHora($reg['P4E'],"+0","+30","+0")){
			$periodo=4;
		}
		if(modificaHora($reg['P5E'],"+0","-30","+0")<=$hora && $hora<=modificaHora($reg['P5E'],"+0","+30","+0")){
			$periodo=5;
		}
		if(modificaHora($reg['P6E'],"+0","-30","+0")<=$hora && $hora<=modificaHora($reg['P6E'],"+0","+30","+0")){
			$periodo=6;
		}
		return $periodo;
}
function verificaObservacionDocente($hora,$periodo){
	global $tipoHoraC;
	$observacion="N";
	$hora=strtotime($hora);
	$sql="SELECT * FROM horas WHERE TipoHora='$tipoHoraC'";
	$res=mysql_query($sql);
	$reg=mysql_fetch_array($res);
		if($periodo==1){if($hora<=strtotime($reg['P1E'])){$observacion="N";}else{$observacion="A";}}
		if($periodo==2){if($hora<=strtotime($reg['P2E'])){$observacion="N";}else{$observacion="A";}}
		if($periodo==3){if($hora<=strtotime($reg['P3E'])){$observacion="N";}else{$observacion="A";}}
		if($periodo==4){if($hora<=strtotime($reg['P4E'])){$observacion="N";}else{$observacion="A";}}
		if($periodo==5){if($hora<=strtotime($reg['P5E'])){$observacion="N";}else{$observacion="A";}}
		if($periodo==6){if($hora<=strtotime($reg['P6E'])){$observacion="N";}else{$observacion="A";}}
	return $observacion;
}
function modificaHora($hora,$horaC="+0",$minutosC="+0",$segundosC="+0"){
	if(gettype($hora)=="string"){$hora=strtotime($hora);}
	$fecha=date("H:i:s", mktime(date("H",$hora)+$horaC ,date("i",$hora)+$minutosC,date("s",$hora)+$segundosC,0,0,0));
	return strtotime($fecha);
}

function audio($texto){
	?><iframe src="http://translate.google.com/translate_tts?ie=UTF-8&q=<?php echo $texto?>&tl=es&prev=input" id="ifaudio"></iframe>
    <?php
}
?>