<?php
$this->pageCaption='Crear OpcionesEncuesta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo opcionesencuesta';
$this->breadcrumbs=array(
	'Opciones Encuesta'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar OpcionesEncuesta','url'=>array('index')),
	array('label'=>'Administrar OpcionesEncuesta','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>