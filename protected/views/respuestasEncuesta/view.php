<?php
$this->pageCaption='Ver RespuestasEncuesta #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Respuestas Encuesta'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar RespuestasEncuesta','url'=>array('index')),
	array('label'=>'Crear RespuestasEncuesta','url'=>array('create')),
	array('label'=>'Actualizar RespuestasEncuesta','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar RespuestasEncuesta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar RespuestasEncuesta','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'encuesta_did',
			        'value'=>$model->encuesta->nombre,),
		array(	'name'=>'respuesta_did',
			        'value'=>$model->respuesta->nombre,),
		'ip',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
		array(	'name'=>'usuario_did',
			        'value'=>$model->usuario->nombre,),
	),
)); ?>
