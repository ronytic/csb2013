<?php
if(!empty($_POST)){
	include_once("../db.php");
	$link=connect();
	$codDocente=$_POST['c'];
	$codigo=$_POST['codigo'];
	$sql="UPDATE docente SET CodBarra='$codigo' WHERE md5(CodDocente)='$codDocente'";
	mysql_query($sql);
	mysql_close($link);
	header("Location: listarDocentes.php");
}
?>