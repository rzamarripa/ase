<?php
$this->pageCaption='Crear Galería';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo galería';
$this->breadcrumbs=array(
	'Galería'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar Galeria','url'=>array('index')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>