<?php
include_once("../../login/check.php");
include_once("../../config.php");
$titulo="Tareas del alumno";
$folder="../../";
include_once("../../class/alumno.php");
include_once("../../class/materias.php");
include_once("../../class/curso.php");
include_once("../../class/tarea.php");
$alumno=new alumno;
$curso=new curso;
$tarea=new tarea;
$materia=new materias;
$CodAlumno=$_SESSION['CodUsuarioLog'];
$al=array_shift($alumno->mostrarDatos($CodAlumno));
$cur=array_shift($curso->mostrarCurso($al['CodCurso']));
include_once("../../cabecerahtml.php");
?>
<?php
include_once("../../cabecera.php");
?>
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
    <div class="grid_6">
    	<div class="titulo corner-tl corner-tr">Tareas Pendientes </div>
        <div class="cuerpo">
        	<table class="tabla">
            	<tr class="cabecera"><td width="15">Nº</td><td width="80">Materia</td><td width="160">Nombre</td><td width="130">Detalle</td><td width="80"><span title="Fecha de Presentación">Fecha Pres.</span></td></tr>
                <?php
				$i=0;
				$Fecha=date("Y-m-d");
                foreach($tarea->mostrarTareaCursoPendiente($al['CodCurso'],$Fecha) as $ta){
					$i++;
					$ma=$materia->mostrarMateria($ta['CodMateria']);
					$ma=array_shift($ma);
					?>
                    <tr class="contenido"><td><?php echo $i;?></td><td><?php echo $ma['Nombre'];?></td><td><?php echo $ta['Nombre'];?></td><td><?php echo $ta['Descripcion'];?></td><td><?php echo date("d-m-Y",strtotime($ta['FechaPresentacion']))?></td></tr>
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
    </div><div class="grid_6">
    	<div class="titulo corner-tl corner-tr">Tareas Revisadas</div>
        <div class="cuerpo">
        	<table class="tabla">
            	<tr class="cabecera"><td width="15">Nº</td><td width="80">Materia</td><td width="160">Nombre</td><td width="130">Detalle</td><td width="80"><span title="Fecha de Presentación">Fecha Pres.</span></td></tr>
                <?php
				$i=0;
				$Fecha=date("Y-m-d");
                foreach($tarea->mostrarTareaCursoRevisadas($al['CodCurso'],$Fecha) as $ta){
					$i++;
					$ma=$materia->mostrarMateria($ta['CodMateria']);
					$ma=array_shift($ma);
					?>
                    <tr class="contenido"><td><?php echo $i;?></td><td><?php echo $ma['Nombre'];?></td><td><?php echo $ta['Nombre'];?></td><td><?php echo $ta['Descripcion'];?></td><td><?php echo date("d-m-Y",strtotime($ta['FechaPresentacion']))?></td></tr>
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
</div>
<?php
include_once("../../footer.php");
?>
</body>
</html>