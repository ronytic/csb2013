<?php
session_start();
include_once("../../login/check.php");
$titulo="Agenda Digital";
include_once("../../class/config.php");
include_once("../../class/alumno.php");
include_once("../../class/cursomateria.php");
include_once("../../class/materias.php");
include_once("../../class/cuota.php");
include_once("../../class/observaciones.php");
include_once("../../class/curso.php");
include_once("../../class/tarea.php");
include_once("../../class/agenda.php");
include_once("../../class/tarea.php");
include_once("../../class/registronotas.php");
include_once("../../class/casilleros.php");
$alumno=new alumno;
$config=new configuracion;
$curso=new curso;
$tarea=new tarea;
$materia=new materias;
$cuota=new cuota;
$agenda=new agenda;
$tarea=new tarea;
$cursomateria=new cursomateria;
$observaciones=new observaciones;
$registronotas=new registronotas;
$casilleros=new casilleros;
$CodAlumno=$_SESSION['CodUsuarioLog'];
$al=$alumno->mostrarDatos($CodAlumno);
$al=array_shift($al);
$cur=$curso->mostrarCurso($al['CodCurso']);
$cur=array_shift($cur);
$cnf=array_shift($config->mostrarConfig("FechaCuota1"));
$FechaCuota1=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota2"));
$FechaCuota2=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota3"));
$FechaCuota3=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota4"));
$FechaCuota4=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota5"));
$FechaCuota5=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota6"));
$FechaCuota6=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota7"));
$FechaCuota7=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota8"));
$FechaCuota8=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota9"));
$FechaCuota9=$cnf['Valor'];
$cnf=array_shift($config->mostrarConfig("FechaCuota10"));
$FechaCuota10=$cnf['Valor'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema Total Internet</title>
<link href="../../css/960/960.css" type="text/css" rel="stylesheet" />
<link href="../../css/internet.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../../images/csb.ico" />
</head>
<body>
<div class="container_12" id="wrapper">
	<div class="grid_12">
    	 <div class="cuerpo">
         	<img src="../../images/alumnos/<?php echo $al['Sexo'].".png"?>" class="foto"/>
         	<div class="datos">
            	
        		<h1 class="nombre"><?php echo ucwords($al['Paterno']." ".$al['Materno']." ".$al['Nombres'])?></h1>
                <p class="otrosdatos"><?php echo $cur['Nombre']?></p>
                <p class="otrosdatos"><?php echo $al['Sexo']?'Hombre':'Mujer';?></p>
                <p class="otrosdatos"><?php echo $al['Ci']?></p>
                <p class="otrosdatos"><?php echo ucwords($al['Zona']." ".$al['Calle']." ".$al['Numero'])?></p>
            </div>
            <div class="acciones">
            	<div class="botones">
    	        	<a href="../../" class="inicio">Inicio</a>
	                <a href="../../login/logout.php" class="salir">Salir</a>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="grid_3">
    	<div class="cuerpo">
        	<h2>Cuotas</h2>
            <table class="tabla">
            	<?php
				$total=0;
				$totalDeuda=0;
				foreach($cuota->mostrarCuotas($al['CodAlumno']) as $cuo){
					
					?>
                    <tr><td class="div"><?php echo $cuo['Numero'];?></td><td  class="div"><?php echo $cuo['MontoPagar'];?> Bs.</td><td><?php echo $cuo['Cancelado']?'Cancelado':'Pendiente';?></td><td><img src="../../images/internet/<?php echo $cuo['Cancelado']?'bien':'mal';?>.png" /></td></tr>
                    <?php
					$total+=$cuo['MontoPagar'];
					if($cuo['Cancelado']){$totalDeuda+=$cuo['MontoPagar'];}
				}
				?>
            </table>
            <div class="msgA">Monto Adeudado: <?php echo $total-$totalDeuda;?> Bs.</div>
        </div>
    </div>
    <div class="grid_9">
    	<div class="cuerpo">
        	<h2>Agenda</h2>
            Las observaciones están ordenadas del registro ultimo al Primero
            <table class="tabla">
          	  <tr class="cabecera"><td width="25">Nº</td><td width="90">Fecha</td><td width="120">Materia</td><td width="150">Observación</td><td width="300">Detalle</td></tr>
            	<?php
                $i=0;
                foreach($agenda->mostrarRegistros($al['CodAlumno']) as $ag){
					$i++;
					$ma=$materia->mostrarMateria($ag['CodMateria']);
					$ma=array_shift($ma);
					$obs=$observaciones->mostrarObser($ag['CodObservacion']);
					$obs=array_shift($obs);
					?>
                    <tr><td class="div"><?php echo $i;?></td><td class="div"><?php echo date("d-m-Y",strtotime($ag['Fecha']));?></td><td class="div"><?php echo $ma['Nombre'];?></td><td class="div"><?php echo $obs['Nombre'];?></td><td><?php echo $ag['Detalle']?></td></tr>
                    <?php
				}
				if($i==0){
				?>
                	<tr><td colspan="5" class="centrar">NO TIENE ANOTACIONES A LA FECHA</td></tr>
                <?php
				}
				?>
            </table>
        </div>
   </div>
		<div class="clear"></div>
		<div class=" grid_6">
            <div class="cuerpo">
                <h2>Tareas Pendientes</h2>
                <table class="tabla">
                	<tr class="cabecera"><td width="15">Nº</td><td width="80">Materia</td><td width="160">Nombre</td><td width="130">Detalle</td><td width="80"><span title="Fecha de Presentación">Fecha</span></td></tr>
                    <?php
				$i=0;
				$Fecha=date("Y-m-d");
                foreach($tarea->mostrarTareaCursoPendiente($al['CodCurso'],$Fecha) as $ta){
					$i++;
					$ma=$materia->mostrarMateria($ta['CodMateria']);
					$ma=array_shift($ma);
					?>
                    <tr><td class="div"><?php echo $i;?></td><td class="div"><?php echo $ma['Nombre'];?></td><td class="div"><?php echo ucfirst(mb_strtolower($ta['Nombre'],"UTF-8"));?></td><td class="div"><?php echo ucfirst(mb_strtolower($ta['Descripcion'],"UTF-8"));?></td><td><?php echo utf8_encode(strftime("%A, %d-%b",strtotime($ta['FechaPresentacion'])))?></td></tr>
                    <?php
				}
				if($i==0){
				?>
                	<tr><td colspan="5" class="centrar">NO TIENE TAREAS PENDIENTES</td></tr>
                <?php
				}
				?>
                </table>
            </div>
        </div>
        <div class=" grid_6">
            <div class="cuerpo">
                <h2>Tareas Revisadas</h2>
                <table class="tabla">
            		<tr class="cabecera"><td width="15">Nº</td><td width="80">Materia</td><td width="160">Nombre</td><td width="130">Detalle</td><td width="80"><span title="Fecha de Presentación">Fecha</span></td></tr>
                <?php
				$i=0;
				$Fecha=date("Y-m-d");
                foreach($tarea->mostrarTareaCursoRevisadas($al['CodCurso'],$Fecha) as $ta){
					$i++;
					$ma=$materia->mostrarMateria($ta['CodMateria']);
					$ma=array_shift($ma);
					?>
                    <tr><td class="div"><?php echo $i;?></td><td class="div"><?php echo $ma['Nombre'];?></td><td class="div"><?php echo ucfirst(mb_strtolower($ta['Nombre'],"UTF-8"));?></td><td class="div"><?php echo ucfirst(mb_strtolower($ta['Descripcion'],"UTF-8"));?></td><td><?php echo utf8_encode(strftime("%A, %d-%b",strtotime($ta['FechaPresentacion'])))?></td></tr>
                    <?php
				}if($i==0){
				?>
                	<tr><td colspan="5" class="centrar">NO TIENE TAREAS REVISADAS</td></tr>
                <?php
				}
				?>
                </table>
            </div>
        </div>
        <div class="clear"></div>
   	
	<div class="grid_12">
    	<div class="cuerpo">
        	<h2>Notas</h2>
            <table class="tabla">
            	<tr class="cabecera"><td width="150">Materias</td><td colspan="3">1<sup>er</sup> Trimestre</td><td colspan="3">2<sup>do</sup> Trimestre</td><td colspan="3">3<sup>er</sup> Trimestre</td><td width="90">Promedio Anual</td><td>Reforzamiento</td><td>Prom. Final</td></tr>
                <tr><td></td><td>PC</td><td>DPS</td><td>PT</td><td>PC</td><td>DPS</td><td>PT</td><td>PC</td><td>DPS</td><td>PT</td><td></td><td></td><td></td></tr>
                <?php
				if(strtotime($Fecha)>strtotime($FechaCuota1)){
					
				}
				
				foreach($cursomateria->mostrarMaterias($al['CodCurso']) as $cm){
					$ma=array_shift($materia->mostrarMateria($cm['CodMateria']));
					$casillas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($cm['CodMateria'],$al['CodCurso'],$al['Sexo'],1));
					$rn1=array_shift($registronotas->mostrarRegistroNotas($casillas['CodCasilleros'],$al['CodAlumno'],1));
					$casillas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($cm['CodMateria'],$al['CodCurso'],$al['Sexo'],2));
					$rn2=array_shift($registronotas->mostrarRegistroNotas($casillas['CodCasilleros'],$al['CodAlumno'],2));
					$casillas=array_shift($casilleros->mostrarMateriaCursoSexoTrimestre($cm['CodMateria'],$al['CodCurso'],$al['Sexo'],3));
					$rn3=array_shift($registronotas->mostrarRegistroNotas($casillas['CodCasilleros'],$al['CodAlumno'],3));
					?>
                    <tr>
                    	<td class="div"><?php echo $ma['Nombre'];?></td>
                        <td class="div der"><?php echo $rn1['Resultado'];?></td>
                        <td class="div der amarillo"><?php echo $rn1['Dps'];?></td>
                        <td class="div der verde"><?php echo $rn1['NotaFinal'];?></td>
                        <td class="div der"><?php echo $rn2['Resultado'];?></td>
                        <td class="div der amarillo"><?php echo $rn2['Dps'];?></td>
                        <td class="div der verde"><?php echo $rn2['NotaFinal'];?></td>
                        <td class="div der"><?php echo $rn3['Resultado'];?></td>
                        <td class="div der amarillo"><?php echo $rn3['Dps'];?></td>
                        <td class="div der verde"><?php echo $rn3['NotaFinal'];?></td>
                        <td class="div der"><?php echo $registronotas->promedio($rn1['NotaFinal'],$rn2['NotaFinal'],$rn3['NotaFinal']);?></td>
                        <td class="div der">0</td>
                        <td class="der">0</td></tr>
                    <?php
				}
				?>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <div class="grid_12">
    	<div class="cuerpo pie">
        	Sistema del Colegio Particular Santa Bárbara &copy; CopyRight 2012
        </div>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30922203-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>