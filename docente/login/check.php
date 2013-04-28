<?php
session_start();
if(!(session_is_registered("login") && isset($_SESSION["login"]) && $_SESSION['login']==1)){
	header("Location:../login/?u=".$_SERVER['PHP_SELF']);
}
?>