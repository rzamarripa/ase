<?php
$this->pageCaption='Crear Evento';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo evento';
$this->breadcrumbs=array(
	'Evento'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Evento','url'=>array('index')),
	array('label'=>'Administrar Evento','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>