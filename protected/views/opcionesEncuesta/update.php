<?php
$this->pageCaption='Actualizar OpcionesEncuesta '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Opciones Encuesta'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar OpcionesEncuesta','url'=>array('index')),
	array('label'=>'Crear OpcionesEncuesta','url'=>array('create')),
	array('label'=>'Ver OpcionesEncuesta','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar OpcionesEncuesta','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>