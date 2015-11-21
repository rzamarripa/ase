<?php
$this->pageCaption='Crear Contacto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo contacto';
$this->breadcrumbs=array(
	'Contacto'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Contacto','url'=>array('index')),
	array('label'=>'Administrar Contacto','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>