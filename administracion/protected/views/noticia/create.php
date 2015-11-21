<?php

$this->pageCaption=($_GET["tipo"] == "not") ? 'Crear Noticia' : 'Crear Publicación';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription=($_GET["tipo"] == "not") ? 'Crear nueva Noticia' : 'Crear nueva Publicación';
if($_GET["tipo"] == "not"){
	$this->breadcrumbs=array(
		'Noticia',
		'Crear',
	);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index','tipo'=>'not')),
	);
}else if ($_GET["tipo"] == "pub"){
	$this->breadcrumbs=array(
		'Publicaciones',
		'Crear',
	);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index','tipo'=>'pub')),
	);
}
?>


<?php echo $this->renderPartial('_form', array('model'=>$model, 'up' => $up)); ?>