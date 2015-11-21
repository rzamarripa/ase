<?php
$this->pageCaption='Noticia';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar noticia';

if($_GET["tipo"] == "not"){
	$this->breadcrumbs=array(
	'Noticia',
);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index','tipo'=>'not')),
		array('label'=>'Crear Noticia','url'=>array('create','tipo'=>'not')),
	);
}else if ($_GET["tipo"] == "pub"){
	$this->breadcrumbs=array(
		'Publicación',
	);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('publicacion','tipo'=>'pub')),
		array('label'=>'Crear Publicación','url'=>array('create','tipo'=>'pub')),
	);
}


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
