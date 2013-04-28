<?php
session_start();
if(!empty($_POST)){
	if(isset($_POST['usuario'],$_POST['pass']) && $_POST['usuario']!="" && $_POST['pass']!=""){
		include_once("../config.php");
		include_once("../db.php");
		$l=connect();
		$url=$_POST['u'];
		$usuario=$_POST['usuario'];
		$pass=$_POST['pass'];
		$u=explode($directory,$_POST['u']);
		//header("location");
		$agente=$_SERVER['HTTP_USER_AGENT'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$lenguaje=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$referencia= $_SERVER['HTTP_REFERER'];
		$sql="SELECT count(*) as can,CodUsuario FROM usuarios WHERE Usuario='$usuario' and Pass='$pass'";
		$res=mysql_query($sql);
		$reg=mysql_fetch_array($res);
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		$codUsuario=$reg['CodUsuario'];
		if($reg['can']==1){
			mysql_query("INSERT INTO logusuarios VALUES(NULL,$codUsuario,'$url','$fecha','$hora','$agente','$ip','$referencia','$lenguaje')");
			session_register("login");
			session_register("CodUsuarioLog");
			$_SESSION['CodUsuarioLog']=$codUsuario;
			$_SESSION['login']=1;
			header("Location:../".$u[1]);
		}
		else{
			header("Location:./?u=".$url);
		}
		mysql_close($l);
	}	
}
?>
