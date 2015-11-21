<?php
$this->pageCaption='Crear RespuestasEncuesta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo respuestasencuesta';
$this->breadcrumbs=array(
	'Respuestas Encuesta'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar RespuestasEncuesta','url'=>array('index')),
	array('label'=>'Administrar RespuestasEncuesta','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>