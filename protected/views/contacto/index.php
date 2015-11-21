<?php
$this->pageCaption='Contacto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar contacto';
$this->breadcrumbs=array(
	'Contacto',
);

$this->menu=array(
	array('label'=>'Crear Contacto','url'=>array('create')),
	array('label'=>'Administrar Contacto','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
