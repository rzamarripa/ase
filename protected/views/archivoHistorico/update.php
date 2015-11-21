<?php
$this->pageCaption='Actualizar ArchivoHistorico '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Archivo Historico'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar ArchivoHistorico','url'=>array('index')),
	array('label'=>'Crear ArchivoHistorico','url'=>array('create')),
	array('label'=>'Ver ArchivoHistorico','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar ArchivoHistorico','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>