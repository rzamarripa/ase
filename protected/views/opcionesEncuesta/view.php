<?php
$this->pageCaption='Ver OpcionesEncuesta #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Opciones Encuesta'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar OpcionesEncuesta','url'=>array('index')),
	array('label'=>'Crear OpcionesEncuesta','url'=>array('create')),
	array('label'=>'Actualizar OpcionesEncuesta','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar OpcionesEncuesta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar OpcionesEncuesta','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		array(	'name'=>'encuesta_did',
			        'value'=>$model->encuesta->nombre,),
		'votos',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>
