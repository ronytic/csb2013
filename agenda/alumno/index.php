<?php
session_start();
include_once("../../login/check.php");
include_once("../../config.php");
$titulo="Agenda Digital";
$folder="../../";
include_once("../../class/alumno.php");
include_once("../../class/materias.php");
include_once("../../class/observaciones.php");
include_once("../../class/curso.php");
include_once("../../class/agenda.php");
$alumno=new alumno;
$curso=new curso;
$agenda=new agenda;
$materia=new materias;
$observaciones=new observaciones;
$CodAlumno=$_SESSION['CodUsuarioLog'];
$al=$alumno->mostrarDatos($CodAlumno);
$al=array_shift($al);
$cur=$curso->mostrarCurso($al['CodCurso']);
$cur=array_shift($cur);

?>
<?php include_once($folder."cabecerahtml.php");?>
</head>
<body>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo">

	<div class="prefix_1 grid_10 suffix_1">
		<div class="titulo corner-tl corner-tr">Datos del ALumno</div>
        <div class="cuerpo">
        	<table class="tabla">
            	<tr class="contenido"><td>Nombre:</td><td><span class="azulT"><?php echo ucwords($al['Paterno']);?> <?php echo ucwords($al['Materno']);?> <?php echo ucwords($al['Nombres'])  ;?></span></td><td>Curso:</td><td><span class="azulT"><?php echo $cur['Nombre'];?></span></td></tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <div class=" prefix_1 grid_10 suffix_1">
    	<div class="titulo corner-tl corner-tr">Agenda </div>
        <div class="cuerpo">
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
                    <tr class="contenido"><td><?php echo $i;?></td><td><?php echo date("d-m-Y",strtotime($ag['Fecha']));?></td><td><?php echo $ma['Nombre'];?></td><td><?php echo $obs['Nombre'];?></td><td><?php echo $ag['Detalle']?></td></tr>
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
</div>
<?php include_once($folder."footer.php");?>
