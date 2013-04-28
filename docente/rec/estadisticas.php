<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../db.php");
$l=connect();

?>

<html>
<head>
<style type="text/css">
*{
margin:1px;
padding:0px;
}
#titulo
{
	width:100%;
	height:20%;
	background-color:#06C;
	text-align:center;
	font-size:48px;
    font-family:Georgia, "Times New Roman", Times, serif;
}
#menu li
{
	width:90%;
	height:30px;
	padding:13px;
	background-color:#900;
	color:#FFF;
	text-align:center;
	font-size:14pt;
    list-style:none;
	text-decoration:none;
	border:#CCC 1px solid;
	

}
#menu li:hover
{
	padding:13px;
	width:80%;
	background-color:#FF2828;
	color:#000;
	text-align:right;
	font-size:14pt;
	border-right:#FF0 20px solid;
}
a{
	display:block;
	height:29px;
	text-decoration:none;
	color:#FFF;
	}
#menu{
	
	float:left;
	width:20%;
	}
	
	#datos
	{
  float:left;
		width:72%;
	height:auto;
	padding:15px;
	background-color:#CCC;
	color:#FFF;
	text-align:center;
	font-size:14pt;
    list-style:none;
	text-decoration:none;
	border:#CCC 1px solid;
	font-size:15pt;
	}
	table{
		font-size:15pt;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
		}
	#abajo
	{
		left:auto;
		
	}
	
</style>
</head>
<body>
<div id="titulo">
CONTROL DE ASISTENCIA DOCENTE
</div>
<div id="abajo">
    <div id="menu">
    <ul>
    <li><a href="estadisticas.php?dt=docentes">VER DOCENTES</a></li>
    <li><a href="estadisticas.php?dt=mes">VER GRAFICOS POR MES</a></li>
    <li><a href="estadisticas.php?dt=otros">VER OTROS</a></li>
    <li><a href="estadisticas.php?dt=ver">VER</a></li>
    </ul>
    </div>
    <div id="datos">
    <?php
    
    include("datos.php");
    ?>
    </div>
</div>
</body>
</html>