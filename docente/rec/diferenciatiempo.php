<? function calcular_tiempo_trasnc($hora1,$hora2){ 
    $separar[1]=explode(':',$hora1); 
    $separar[2]=explode(':',$hora2); 

$total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
$total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1]; 
$total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2]; 
if($total_minutos_trasncurridos<=59) return($total_minutos_trasncurridos.' Minutos'); 
elseif($total_minutos_trasncurridos>59){ 
$HORA_TRANSCURRIDA = round($total_minutos_trasncurridos/60); 
if($HORA_TRANSCURRIDA<=9) $HORA_TRANSCURRIDA='0'.$HORA_TRANSCURRIDA; 
$MINUITOS_TRANSCURRIDOS = $total_minutos_trasncurridos%60; 
if($MINUITOS_TRANSCURRIDOS<=9) $MINUITOS_TRANSCURRIDOS='0'.$MINUITOS_TRANSCURRIDOS; 
return ($HORA_TRANSCURRIDA.':'.$MINUITOS_TRANSCURRIDOS.' Horas'); 

} } 


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
$hora=date("h:i:s");
$mes=date("m");
$diam=date("d");
/*if($_POST[tipo]=="S")
{
	$sqlf="INSERT INTO listadocente  values(NULL, $CodDocente,'$dia', 'S','N','$hora', '$mes','$diam');";
		 mysql_query($sqlf);
	
}*/
//verificamos si ya entro

$rs = mysql_query("SELECT MAX(codigo) AS id FROM listadocente WHERE CodDocente=$reg[CodDocente]");
	if ($row = mysql_fetch_row($rs))
	{
	$id = trim($row[0]);
	}
$sql="SELECT Tipo FROM listadocente WHERE codigo=$id";
$res=mysql_query($sql);
$f=mysql_fetch_array($res);
if($f[Tipo]!="E")
?>