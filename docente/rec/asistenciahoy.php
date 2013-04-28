<?php
include_once("../login/check.php");
include_once("../config.php");
include_once("../db.php");
$l=connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
body{
background-color:#999999;
}
.par {
	background-color:#CCCCCC;
	
}
.titul
{
background-color:#0000CC;
color:#FFFFFF;
}
#conn
{
margin:5px auto 5px 300px;


}
.atraso{
color:#FF3300;
background:#000000;
}
.extra
{
background-color:#FFFFFF;
color:#006699;
}
.normal
{
background-color:#00FF00;
color:#000000;
}
</style>
</head>

<body>
<div id="conn">
<?php
	 $mes=date("m");
$diam=date("d");
	 $sqldd="SELECT l.CodDocente,d.Paterno,d.Nombres, l.Hora,l.diam , l.Tipo,l.Observacion FROM  listadocente l, docente d WHERE l.CodDocente=d.CodDocente and diam='$diam' and mes='$mes' ORDER BY l.Hora DESC";
	$resss=mysql_query($sqldd);
echo "<table border=1><tr><td colspan=4 class='titul'>ASISTENCIA DE HOY</td> </tr>";

while($ffil=mysql_fetch_array($resss))
{

 echo "<tr class='";
 if($ffil[Observacion]=='A')
 {echo "atraso";
 }
  if($ffil[Observacion]=='E')
 {echo "extra";
 }
 if($ffil[Observacion]=='N')
 {echo "normal";
 }


 echo "'><td>". utf8_decode($ffil[Paterno])."</td><td>".utf8_decode($ffil[Nombres])."</td><td>  $ffil[Hora]</td><td> ";
  if($ffil[Tipo]=='E')
  {echo "ENTRADA";
  }
  if($ffil[Tipo]=='S')
  {echo "SALIDA";
  }
 echo "</td></tr>";
}
echo "</table>";
	 ?>
	 </div>
</body>
</html>
