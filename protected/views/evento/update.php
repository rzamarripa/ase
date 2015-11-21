<?php
$this->pageCaption='Actualizar Evento '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Evento'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Evento','url'=>array('index')),
	array('label'=>'Crear Evento','url'=>array('create')),
	array('label'=>'Ver Evento','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Evento','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>