<?php
$this->pageCaption='Noticia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar noticia';
$this->breadcrumbs=array(
	'Noticia',
);

$this->menu=array(
	array('label'=>'Crear Noticia','url'=>array('create')),
	array('label'=>'Administrar Noticia','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
