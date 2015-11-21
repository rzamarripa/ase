<?php
$this->pageCaption='Opciones Encuesta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar opciones encuesta';
$this->breadcrumbs=array(
	'Opciones Encuesta',
);

$this->menu=array(
	array('label'=>'Crear OpcionesEncuesta','url'=>array('create')),
	array('label'=>'Administrar OpcionesEncuesta','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
