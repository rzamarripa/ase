<?php
$this->pageCaption='Archivo Historico';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar archivo historico';
$this->breadcrumbs=array(
	'Archivo Historico',
);

$this->menu=array(
	array('label'=>'Crear ArchivoHistorico','url'=>array('create')),
	array('label'=>'Administrar ArchivoHistorico','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
