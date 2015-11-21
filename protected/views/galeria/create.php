<?php
$this->pageCaption='Crear Galeria';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo galeria';
$this->breadcrumbs=array(
	'Galeria'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Galeria','url'=>array('index')),
	array('label'=>'Administrar Galeria','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>