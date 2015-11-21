<?php
$this->pageCaption='Ver Coleccion #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Coleccion'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Coleccion','url'=>array('index')),
	array('label'=>'Crear Coleccion','url'=>array('create')),
	array('label'=>'Actualizar Coleccion','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Coleccion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Coleccion','url'=>array('admin')),
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
		array(	'name'=>'tipoClasificacion_did',
			        'value'=>$model->tipoClasificacion->nombre,),
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
		'Tipo',
	),
)); ?>
