<?php
$this->pageCaption='Actualizar Noticia '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';

if($_GET["tipo"] == "not"){
	$this->breadcrumbs=array(
		'Noticia',
		$model->id,
		'Actualizar',
	);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index','tipo'=>'not')),
		array('label'=>'Crear Noticia','url'=>array('create','tipo'=>'not')),
	);
}else if ($_GET["tipo"] == "pub"){
	$this->breadcrumbs=array(
		'Publicación',
		$model->id,
		'Actualizar',
	);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index','tipo'=>'pub')),
		array('label'=>'Crear Publicación','url'=>array('create','tipo'=>'pub')),
	);
}

?>

<?php echo $this->renderPartial('_form',array('model'=>$model,'up'=>$up)); ?>