<?php
$this->pageCaption='Crear Coleccion';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo coleccion';
$this->breadcrumbs=array(
	'Coleccion'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Coleccion','url'=>array('index')),
	array('label'=>'Administrar Coleccion','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>