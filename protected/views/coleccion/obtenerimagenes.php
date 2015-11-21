<?php
	$archivo = ArchivoHistorico::model()->find("volumen_did = :v and coleccion_did = :c",array(":v"=>$_GET["id"], ":c"=>$_GET["col"]));
	$imagenes = ArchivoHistoricoDetalle::model()->findAll("Id_Archivo = " . $_GET["id"]);	
  header("Content-Disposition: inline; filename='hola'"); 
	foreach($imagenes as $imagen){
		 echo $imagen->imagen;
	} 
?>