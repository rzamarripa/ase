<?php
$this->pageCaption='Actualizar Encuesta '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Encuesta'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Encuesta','url'=>array('index')),
	array('label'=>'Crear Encuesta','url'=>array('create')),
	array('label'=>'Ver Encuesta','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Encuesta','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>