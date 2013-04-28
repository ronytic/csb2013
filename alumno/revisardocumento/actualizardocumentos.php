<?php
include_once("../../login/check.php");
include_once("../../class/documento.php");
if(!empty($_POST)){
	$doc=new documento;
	
	$CodAlumno=$_POST['Matricula'];

	$CertificadoNac=$_POST['CertificadoNac'];if($CertificadoNac=="on")$CertificadoNac=1;else $CertificadoNac=0;
	$LibretaEsc=$_POST['LibretaEsc'];if($LibretaEsc=="on")$LibretaEsc=1;else $LibretaEsc=0;
	$LibretaVac=$_POST['LibretaVac'];if($LibretaVac=="on")$LibretaVac=1;else $LibretaVac=0;
	$CedulaId=$_POST['CedulaId'];if($CedulaId=="on")$CedulaId=1;else $CedulaId=0;
	$CedulaIdP=$_POST['CedulaIdP'];if($CedulaIdP=="on")$CedulaIdP=1;else $CedulaIdP=0;
	$CedulaIdM=$_POST['CedulaIdM'];if($CedulaIdM=="on")$CedulaIdM=1;else $CedulaIdM=0;
	$ObservacionesDoc=$_POST['ObservacionesDoc'];
	$valuesDoc=array('CertificadoNac'=>$CertificadoNac,
					'LibretaEsc'=>$LibretaEsc,
					'LibretaVac'=>$LibretaVac,
					'CedulaId'=>$CedulaId,
					'CedulaIdP'=>$CedulaIdP,
					'CedulaIdM'=>$CedulaIdM,
					'Observaciones'=>"LOWER('$ObservacionesDoc')"
					);
	$doc->actualizarDocumento($valuesDoc,$CodAlumno);
	header("Location:../../");
}
?>