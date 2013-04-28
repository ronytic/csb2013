<?php
session_start();
include_once("../../login/check.php");
include_once("../../class/config.php");
include_once("../../class/alumno.php");
include_once("../../class/casilleros.php");
include_once("../../class/docentemateriacurso.php");
include_once("../../class/registronotas.php");
include_once("../../class/curso.php");
include_once("../../class/materias.php");
include_once("../fn.php");
if(!empty($_POST)){
	$CodCurso=$_POST['CodCurso'];
	$CodMateria=$_POST['CodMateria'];
	$CodDocente=$_SESSION['CodDocente'];
	$CodTrimestre=$_POST['Trimestre'];
	$alumnos=new alumno;
	$docentemateriacurso=new docentemateriacurso;
	$casilleros=new casilleros;
	$registroNotas=new registronotas;
	$fn=new funciones;
	$config=new configuracion;
	$curso=new curso;
	$materias=new materias;
	$mat=array_shift($materias->mostrarMateria($CodMateria));
	$cur=array_shift($curso->mostrarCurso($CodCurso));
	$casillas=array_shift($casilleros->mostrarDocenteMateriaCursoTrimestre($CodDocente,$CodMateria,$CodCurso,$CodTrimestre));
	$CodCasilleros=$casillas['CodCasilleros'];
	$Sexo=$casillas['SexoAlumno'];
	$numcasilleros=$casillas['Casilleros'];
	$Dps=$casillas['Dps'];
	$FormulaCalificaciones=$dcasillas['FormulaCalificaciones'];
	
	$cnf=array_shift($config->mostrarConfig("RegistroNotaHabilitado"));
	$registronotashabilitado=$cnf["Valor"];
	$cnf=array_shift($config->mostrarConfig("TrimestreNotaHabilitado"));
	$trimestrenotahabilitado=$cnf["Valor"];
	if($registronotashabilitado==1){
		if($CodTrimestre!=$trimestrenotahabilitado)
		{$restringir='readonly="readonly" disabled="disabled"';}
		else{$restringir='';}
	}else{
		$restringir='readonly="readonly" disabled="disabled"';	
	}
	
	for($i=1;$i<=15;$i++){
		$Etiquetas[$i]=$docMat['NombreCasilla'.$i];
	}
	if(count($casillas)<=0){?><span class="resaltar">No Existe Casilleros Registrados para este Docente, Curso, Materia y Trimestre</span><?php exit();}
	?>
    <!--<div style="display:inline-block;">-->
    <div class="cuerpo">Curso: <span class="resaltar"><?php echo $cur['Nombre']?> </span> | Materia: <span class="resaltar"><?php echo $mat['Nombre']?></span> | Trimestre: <span class="resaltar"><?php echo $CodTrimestre?></span> | Nota de Califcación: <span class="resaltar"><?php echo $cur['NotaTope']?></span> | Nota Reprobación: <span class="resaltar"><?php echo $cur['NotaAprobacion']?></span>
    <input type="hidden" name="NotaAprobacion" value="<?php echo $cur['NotaAprobacion']?>"/>
    </div>
	<table class="tabla" style="display:inline-block;overflow-x:visible; margin-bottom:36px;vertical-align:top">
		<tr class="cabecera"><td>Nº</td><td>Paterno</td><td>Materno</td><td>Nombres</td>
        	<?php for($i=1;$i<=$numcasilleros;$i++){?>
     		<td style="width:10px"><span title="<?php echo $casillas['NombreCasilla'.$i];?>"  rel="<?php echo $casillas['LimiteCasilla'.$i];?>" id="t<?php echo $i;?>"><?php echo $fn->sacarIniciales($casillas['NombreCasilla'.$i])?></span></td>
     <?php }?>
        	<td>Resultado</td><?php if($Dps){?><td>Dps</td><?php }?><td>Final</td>
	    </tr> 

	<?php
	$na=0;
	
	foreach($alumnos->mostrarAlumnosCurso($CodCurso,$Sexo) as $al){
		$na++;
		$regNota=$registroNotas->mostrarRegistroNotas($CodCasilleros,$al['CodAlumno'],$CodTrimestre);
		$regNota=array_shift($regNota);
		?>
       
        <tr class="contenido" style="height:35px;"  rel="<?php echo $al['CodAlumno']?>">
        	<td><?php echo $na;?></td>
            <td><?php echo  ucwords($al['Paterno']);?></td>
            <td><?php echo ucwords($al['Materno']);?></td>
            <td><?php echo ucwords($al['Nombres']);?></td>
            <?php for($i=1;$i<=$numcasilleros;$i++){?>
            <td style="text-align:center"><input type="text" size="1" maxlength="<?php echo strlen($cur['NotaTope'])?>" class="nota <?php echo($i==$numcasilleros)?'final':'';?>" value="<?php echo $regNota['Nota'.$i]?>" id="al[<?php echo $na;?>][n<?php echo $i;?>]" rel="<?php echo $al['CodAlumno']?>" data-col="<?php echo $i;?>" data-row="<?php echo $al['CodAlumno'];?>" data-cod="<?php echo $CodCasilleros;?>" <?php echo $restringir?>/></td>
            <?php
			}
			?>
            <td style="text-align:center" class="amarillo"><input type="text" size="1" maxlength="2" readonly="readonly" class="nota" value="<?php echo $regNota['Resultado']?>" id="resultado<?php echo $al['CodAlumno']?>"/></td>
            <?php
				if($Dps){
			?>
            <td style="text-align:center" class="amarillo"><input type="text" size="1" maxlength="2" readonly="readonly" class="nota" value="<?php echo $regNota['Dps']?>" id="dps<?php echo $al['CodAlumno']?>"/></td>
            <?php
				}
			?>
            <td style="text-align:center" class="verde"><input type="text" size="1" maxlength="2" readonly="readonly" class="nota <?php echo $regNota['NotaFinal']<$cur['NotaAprobacion']?"rojo":"";?>" value="<?php echo $regNota['NotaFinal']?>" id="notaf<?php echo $al['CodAlumno']?>"/></td>
        </tr>
	<?php
	}
	?> 
    </table>
    <hr />
	<input type="submit" value="Guardar Nota" class="corner-all" id="guardarNotas"/>
	<?php
}
?>