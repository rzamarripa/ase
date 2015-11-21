<?php
$this->pageCaption='Actualizar RespuestasEncuesta '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Respuestas Encuesta'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar RespuestasEncuesta','url'=>array('index')),
	array('label'=>'Crear RespuestasEncuesta','url'=>array('create')),
	array('label'=>'Ver RespuestasEncuesta','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar RespuestasEncuesta','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>