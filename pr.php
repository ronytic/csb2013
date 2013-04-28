<?php
$values=array("casillero1"=>12,"casillero13"=>60);
$dato="n1";
$numcasillas=explode("n",$dato);
echo $values["casillero".$numcasillas[1]];
?>