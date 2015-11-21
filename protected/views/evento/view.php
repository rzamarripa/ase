<?php
$this->pageCaption='Ver Evento #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Evento'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Evento','url'=>array('index')),
	array('label'=>'Crear Evento','url'=>array('create')),
	array('label'=>'Actualizar Evento','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar Evento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Evento','url'=>array('admin')),
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
		'descripcion',
		'fechaInicio_ft',
		'fechaFin_ft',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>
