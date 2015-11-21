<?php
$this->pageCaption='Detalle Galeria';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar detalle galeria';
$this->breadcrumbs=array(
	'Detalle Galeria',
);

$this->menu=array(
	array('label'=>'Crear DetalleGaleria','url'=>array('create')),
	array('label'=>'Administrar DetalleGaleria','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
