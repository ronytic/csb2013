<?php
include_once("../login/check.php");
include_once("../config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Registro de Docente | <?php echo $title?>::.</title>
<link href="../css/960/960.css" rel="stylesheet" type="text/css" />
<link href="../css/core.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/ui/jquery.ui.all.css"/>
<script src="../js/jquery.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript" src="../js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" language="javascript" src="../js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" language="javascript" src="js/script.js"></script>
</head>
<body>
<div class="container_12 corner-tl corner-tr " id="cabecera">
	<div class="grid_5"><?php echo $title?> | Registro de Docentes</div>
    <div class="grid_7"><div class="botonessec"><a href="../login/salir.php" class="corner-all">Salir</a></div></div>
    <div class="clear"></div>
</div>
<div class="container_12 corner-tl corner-tr " id="cuerpo">
	<form action="registroNuevo.php" method="post" >
	<div class="prefix_1 grid_5">
    	<div class="title">Datos Personales</div>
        <div class="cuerpo">
			<table>
            <tr><td class="der">Paterno</td><td>::</td><td><input type="text" autofocus="autofocus" placeholder="Apellido Paterno" required="required" name="paterno"/></td></tr>
            <tr><td class="der">Materno</td><td>::</td><td><input type="text" placeholder="Apellido Materno" required="required" name="materno"/></td></tr>
           	<tr><td class="der">Nombres</td><td>::</td><td><input type="text"  placeholder="Apellido Nombres" required="required" name="nombres"/></td></tr>
            <tr><td class="der">Sexo</td><td>::</td><td><select name="sexo"><option value="0">Femenino</option><option value="1">Masculino</option></select></td></tr>
            <tr><td class="der">Fecha Nacimiento</td><td>::</td><td><input type="text"  placeholder="Fecha de Nacimiento" required="required" name="fechanac" class="fecha"/>(aaaa/mm/dd)</td></tr>
            <tr><td class="der">Departamento</td><td>::</td><td><select name="departamento"><option value="La Paz">La Paz</option>
              <option value="Cochabamba">Cochabamba</option>
              <option value="Santa Cruz">Santa Cruz</option>
              <option value="Chuquisaca">Chuquisaca</option>
              <option value="Oruro">Oruro</option>
              <option value="Beni">Beni</option>
              <option value="Tarija">Tarija</option>
              <option value="Potosi">Potosi</option>
              <option value="Pando">Pando</option>
            </select></td></tr>
            <tr><td class="der">Provincia</td><td>::</td><td><input type="text" placeholder="Provincia" required="required" name="provincia"/></td></tr>
            <tr><td class="der">E-mail</td><td>::</td><td><input type="text" placeholder="E-mail"/ name="email"></td></tr>
            <tr><td class="der">Dirección</td><td>::</td><td><input type="text" placeholder="Direccion" required="required" name="direccion"/></td></tr>
            <tr><td class="der">Teléfono</td><td>::</td><td><input type="text" placeholder="Teléfono" name="telefono"/></td></tr>
            <tr><td class="der">Celular</td><td>::</td><td><input type="text" placeholder="Celular" name="celular"/></td></tr>
            <tr><td class="der">Estado Civil</td><td>::</td><td><select name="estadocivil"><option value="soltero">Soltero</option><option value="casado">Casado</option><option value="divorciado">Divorciado</option><option value="viudo">Viudo</option></select></td></tr>
            </table>
        </div>
        <div class="cuerpo"><table><tr><td>Observaciones</td></tr><tr><td><textarea name="observaciones" cols="40" rows="2" placeholder="Observaciones..."></textarea></td></table></div>
    </div>
    <div class="grid_5 suffix_1">
    	<div class="title">Datos Profesionales</div>
        <div class="cuerpo">
        	<table>
            	<tr><td class="der">Departamento</td><td>::</td><td><input type="text" placeholder="Departamento" required="required" name="DPdepartamento"/></td></tr>
                <tr><td class="der">Universidad</td><td>::</td><td><input type="text" placeholder="Universidad" required="required" name="DPuniversidad"/></td></tr>
                <tr><td class="der">Año de Ingreso</td><td>::</td><td><input type="text" placeholder="Año de Ingreso de Universidad" required="required" name="DPanoingreso"/>(ej: 1998)</td></tr>
                <tr><td class="der">Año de Egreso</td><td>::</td><td><input type="text" placeholder="Año de Egreso de Universidad" required="required" name="DPanoegreso"/>(ej: 1998)</td></tr>
                <tr><td class="der">Año de Titulación</td><td>::</td><td><input type="text" placeholder="Año de Titulación" required="required" name="DPanotitulacion"/>(ej: 1998)</td></tr>
                <tr><td class="der">Titulo</td><td>::</td><td><input type="text" placeholder="Titulo" required="required" name="DPtitulo"/></td></tr>
            </table>
        </div>
        <div class="title">Datos Trabajo</div>
        <div class="cuerpo">
        	<table>
            	<tr><td class="der">Cargo</td><td>::</td><td><input type="text" placeholder="Cargo" required="required" name="DTcargo"/></td></tr>
                <tr><td class="der">Carga Horaria</td><td>::</td><td><input type="text" placeholder="Carga Horaria" required="required" name="DTcargahoraria"/></td></tr>
                <tr><td class="der">Antigüedad</td><td>::</td><td><input type="text" placeholder="Antigüedad" required="required" name="DTantiguedad"/></td></tr>
                <tr><td class="der">Categoria</td><td>::</td><td><input type="text" placeholder="Categoria" required="required" name="DTcategoria"/></td></tr>
        	</table>
    	</div>
    </div>
    <div class="clear"></div>
	<div class="suffix_5 grid_2 prefix_5">
    	<div class="botones"><input type="reset" value="Limpiar" class="corner-all"/><input type="submit" value="Guardar" class="corner-all"/></div>
    </div>
    </form>
    <div class="clear"></div>
</div>
</body>
</html>