<?php
$this->pageCaption='Actualizar Respuesta '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Respuesta'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('encuesta/view','id'=>$model->encuesta_did)),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>