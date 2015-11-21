<?php
$this->pageCaption='Actualizar Coleccion '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Coleccion'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Coleccion','url'=>array('index')),
	array('label'=>'Crear Coleccion','url'=>array('create')),
	array('label'=>'Ver Coleccion','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Coleccion','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>