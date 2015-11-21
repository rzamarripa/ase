<?php
$this->pageCaption='Crear Carrusel';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo carrusel';
$this->breadcrumbs=array(
	'Carrusel'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Volver','url'=>array('index')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model, 'up'=>$up)); ?>