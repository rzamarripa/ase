<?php
$this->pageCaption='Encuesta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar encuesta';
$this->breadcrumbs=array(
	'Encuesta',
);

$this->menu=array(
	array('label'=>'Crear Encuesta','url'=>array('create')),
	array('label'=>'Administrar Encuesta','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
