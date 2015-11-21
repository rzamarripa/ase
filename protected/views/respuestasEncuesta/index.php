<?php
$this->pageCaption='Respuestas Encuesta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar respuestas encuesta';
$this->breadcrumbs=array(
	'Respuestas Encuesta',
);

$this->menu=array(
	array('label'=>'Crear RespuestasEncuesta','url'=>array('create')),
	array('label'=>'Administrar RespuestasEncuesta','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
