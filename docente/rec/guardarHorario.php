<?php
include_once("../login/check.php");
	if(!empty($_POST)){
		include_once("../db.php");
		$l=connect();
		$horario=$_POST['horario'];
		$codDocente=$_POST['c'];
		$sql="SELECT * FROM docente WHERE md5(CodDocente)='$codDocente'";
		$r=mysql_fetch_array(mysql_query($sql));
		mysql_query("DELETE FROM asignacionhorariodocente WHERE md5(CodDocente)='$codDocente'");
		foreach($horario as $periodo=>$val){
			foreach($val as $dia =>$valor){
				$sql="INSERT INTO asignacionhorariodocente VALUES(NULL,{$r['CodDocente']},$dia,$periodo);";
				mysql_query($sql);
			}	
		}
		mysql_close($l);
	}
?>
<script language="javascript" type="application/javascript">
	alert("Sus Datos se han Grabado Correctamente");
	window.location="listarDocentes.php";
</script>