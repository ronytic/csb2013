<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../db.php");
$l=connect();
$CodDocente=
$mes=date("m");
$diam=date("d");
$sql="SELECT CodDocente, Tipo, Hora FROM listadocente WHERE Coddocente=$CodDocente and diam='$diam' and mes='$mes'  ORDER BY Hora DESC";
$res=mysql_query($sql);
$f=mysql_fetch_array($res);
if($f[Tipo]=="S")
{echo "el tipo es S";
}
else
{
echo "NO,   el tipo es $f[Tipo]";
}

?>