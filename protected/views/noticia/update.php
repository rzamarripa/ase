<?php
$this->pageCaption='Actualizar Noticia '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Noticia'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Noticia','url'=>array('index')),
	array('label'=>'Crear Noticia','url'=>array('create')),
	array('label'=>'Ver Noticia','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar Noticia','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>