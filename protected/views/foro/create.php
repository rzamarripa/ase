<?php
if(isset($_GET["id"])){
	$foro = Foro::model()->find("id =" . $_GET["id"]);
	$this->pageCaption='Responder el foro:';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription=$foro->titulo;

	$this->menu=array(
		array('label'=>'Volver al Foro','url'=>array('foro/view','id'=>$_GET["id"])),
		array('label'=>'Ver todos los Foros','url'=>array('foro/index')),
	);
}
$this->pageCaption='Nuevo foro:';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="";

$this->menu=array(
	array('label'=>'Volver','url'=>array('foro/index')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>