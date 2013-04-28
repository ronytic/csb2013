<?php
include_once("../db.php");
$sqlVerificaDocente="SELECT `CodDocente`,`Paterno`,`Materno` ,`Nombres`,Sexo FROM docente WHERE codDocente='1'";
	$reg=mysql_fetch_array(mysql_query($sqlVerificaDocente));
	$reg[]
	$saludo="";
	$hora=date("h:i:s");
	if( strtotime($hora)<strtotime("13:40"))
	{
		$turno="M";$saludo.="Buenos Dias, ";
	}
	else
	{
		$turno="T";$saludo.="Buenas Tardes, ";
	}
	//////////////////////////
	if($reg['Sexo']==1)
	{
		$saludo.="Profesor ";
	}
	else
	{
		$saludo.="Profesora ";
	}
	$saludo.=$reg['Nombres']." ".$reg['Paterno'
		
	$saludo="Buenos Dias, "
function audio($texto){
	?><iframe src="http://translate.google.com/translate_tts?ie=UTF-8&q=<?php echo $texto?>&tl=es&prev=input" id="ifaudio"></iframe>
    <?php
}
?>