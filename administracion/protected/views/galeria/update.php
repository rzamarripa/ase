<?php
$this->pageCaption='Actualizar Galería '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Galería'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver a la Galería','url'=>array('index')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>