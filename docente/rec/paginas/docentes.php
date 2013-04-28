<?php

$sql="SELECT CodDocente,Paterno, Materno, Nombres  FROM docente";
$resultado=mysql_query($sql);
echo "<table border=1><tr> <td>CODIGO</td><td>AP. PATERNO</td><td>AP. MATERNO</td><td>NOMBRES</td><td>atrasos</td><td>Faltas</td><td>Descuento</td></tr>";
while($fila=mysql_fetch_array($resultado))
{
echo "<tr><td>".$fila[CodDocente]."</td><td>".utf8_decode($fila[Paterno])."</td><td>".utf8_decode($fila[Materno])."</td><td>".utf8_decode($fila[Nombres])."</td><td></td><td></td><td></td></tr>";
}
echo "</table>";
?>