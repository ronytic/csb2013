<? 
$strC = "BCDFGHJKLMNPRSTVYZ";
$strV = "AEIOU";
$cad = "";
for($i=0;$i<3;$i++) {
$cad .= substr($strC,rand(0,strlen($strC)-1),1).substr($strV,rand(0,strlen($strV)-1),1);
}
//print $cad;
$texto="Trabajos Prácticos";
echo sacarIniciales($texto);
function sacarIniciales($texto){
		$iniciales="";
		$datos=explode(" ",$texto);
		for($i=0;$i<count($datos);$i++){
			$iniciales.=$datos[$i][0];
		}
		return mb_strtoupper($iniciales);		
}
?>