<?php
$this->pageCaption='Actualizar Galeria '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Galeria'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Galeria','url'=>array('index')),
	array('label'=>'Crear Galeria','url'=>array('create')),
	array('label'=>'Ver Galeria','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Galeria','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>