<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/documento.php");
include_once("../../config.php");
$titulo="Modificar datos del Alumno";
$folder="../../";
include_once("../../class/curso.php");
include_once("../../class/config.php");
$curso=new curso;
$conf=new configuracion;
$alumno=new alumno;
$documento=new documento;
if(!empty($_GET) && $_GET['CodAlumno']!=""){
$CodAlumno=$_GET['CodAlumno'];
$confgKinder=array_shift($conf->mostrarConfig("MontoKinder"));
$confgGeneral=array_shift($conf->mostrarConfig("MontoGeneral"));
$al=$alumno->mostrarDatos($CodAlumno);
$al=array_shift($al);
$doc=$documento->mostrarDocumento($CodAlumno);
$doc=array_shift($doc);


?>
<?php include_once($folder."cabecerahtml.php");?>
<?php include_once($folder."cabecera.php");?>
<div class="container_12" id="cuerpo"><form action="actualizardocumentos.php" method="post" onSubmit="if(this.Curso.value==0){alert('Selecciona el Curso');return false;}">
	<div class="prefix_1 grid_5">
		<div class="titulo corner-tl corner-tr">Datos del Alumno</div>
        <div class="cuerpo">
        	
        	<table>
            	<tr><td class="der">Matricula</td><td>::</td><td><input name="Matricula" type="text" id="matricula" value="<?php echo $al['CodAlumno']?>" size="30" readonly/></td></tr>
                <tr><td class="der">Curso</td><td>::</td><td><select name="Curso" id="curso" autofocus disabled="disabled"><option value="0">Selecciona el Curso</option><?php foreach($curso->listar() as $cur){
														?><option value="<?php echo $cur['CodCurso']?>" <?php if($cur['CodCurso']==$al['CodCurso'])echo 'selected="selected"'?>><?php echo $cur['Nombre']?></option><?php	
													}?></select></td></tr>
                <tr><td class="der">Apellido Paterno</td><td>::</td><td><input name="Paterno" type="text" size="30" required value="<?php echo $al['Paterno'];?>" readonly="readonly"/></td></tr>
                <tr><td class="der">Apellido Materno</td><td>::</td><td><input name="Materno" type="text" size="30" required value="<?php echo $al['Materno'];?>" readonly="readonly"/></td></tr>
                <tr><td class="der">Nombres</td><td>::</td><td><input name="Nombres" type="text" size="30" required  value="<?php echo $al['Nombres'];?>" readonly="readonly"/></td></tr>
              </table>
        </div>
        
    </div>
    <div class="grid_6">
    	<div class="titulo corner-tl corner-tr">Documentos</div>
        <div class="cuerpo">
            <table>
            	<tr><td class="der"><label for="cn">Certificado de Nacimiento</label></td><td>::</td><td><input type="checkbox" name="CertificadoNac" id="cn" <?php echo $doc['CertificadoNac']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="le">Libreta Escolar</label></td><td>::</td><td><input type="checkbox" name="LibretaEsc" id="le" <?php echo $doc['LibretaEsc']?'checked="checked"':'';?>/></td></tr>
                 <tr><td class="der"><label for="lv">Libreta de Vacunas</label></td><td>::</td><td><input type="checkbox" name="LibretaVac" id="lv" <?php echo $doc['LibretaVac']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="CedulaId">C.I. del Alumno</label></td><td>::</td><td><input type="checkbox" name="CedulaId" id="CedulaId" <?php echo $doc['CedulaId']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="CedulaIdP">C.I. del Padre</label></td><td>::</td><td><input type="checkbox" name="CedulaIdP" id="CedulaIdP" <?php echo $doc['CedulaIdP']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der"><label for="CedulaIdM">C.I. de la Madre</label></td><td>::</td><td><input type="checkbox" name="CedulaIdM" id="CedulaIdM" <?php echo $doc['CedulaIdM']?'checked="checked"':'';?>/></td></tr>
                <tr><td class="der">Observaciones Documentos</td><td>::</td><td><textarea name="ObservacionesDoc" rows="5" cols="30"><?php echo $doc['Observaciones'];?></textarea></td></tr>
                <tr><td></td><td></td><td><input type="submit" value="Guardar Alumno" class="corner-all"/><input type="reset" class="corner-all" value="Vaciar"></td></tr>
            </table>
            
        </div>
    </div>
    </form>
    <div class="clear"></div>
</div>
<?php include_once($folder."footer.php");?>
<?php
}
?>