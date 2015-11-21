<?php
$this->pageCaption='Actualizar Carrusel '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Carrusel'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'up' => $up)); ?>