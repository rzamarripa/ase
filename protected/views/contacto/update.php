<?php
$this->pageCaption='Actualizar Contacto '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Contacto'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Contacto','url'=>array('index')),
	array('label'=>'Crear Contacto','url'=>array('create')),
	array('label'=>'Ver Contacto','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Contacto','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>