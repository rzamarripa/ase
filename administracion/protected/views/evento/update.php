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
	array('label'=>'Volver','url'=>array('listar')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>