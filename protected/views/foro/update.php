<?php
$this->pageCaption='Actualizar Foro '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Foro'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Foro','url'=>array('index')),
	array('label'=>'Crear Foro','url'=>array('create')),
	array('label'=>'Ver Foro','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Foro','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>