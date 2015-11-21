<?php
$this->pageCaption='Ver Encuesta #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Encuesta'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Encuesta','url'=>array('index')),
	array('label'=>'Crear Encuesta','url'=>array('create')),
	array('label'=>'Actualizar Encuesta','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Encuesta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Encuesta','url'=>array('admin')),
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
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>
