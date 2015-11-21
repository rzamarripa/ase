<?php
$this->pageCaption='Crear Encuesta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo encuesta';
$this->breadcrumbs=array(
	'Encuesta'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Encuesta','url'=>array('index')),
	array('label'=>'Administrar Encuesta','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>