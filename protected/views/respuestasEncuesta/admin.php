<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='respuestas encuesta';
$this->breadcrumbs=array(
	'Respuestas Encuesta'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar RespuestasEncuesta','url'=>array('index')),
	array('label'=>'Crear RespuestasEncuesta','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'respuestas-encuesta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'encuesta_did',
		        'value'=>'$data->encuesta->nombre',
			    'filter'=>CHtml::listData(Encuesta::model()->findAll(), 'id', 'nombre'),),
		array('name'=>'respuesta_did',
		        'value'=>'$data->respuesta->nombre',
			    'filter'=>CHtml::listData(Respuesta::model()->findAll(), 'id', 'nombre'),),
		'ip',
		'fechaCreacion_f',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		/*
		array('name'=>'usuario_did',
		        'value'=>'$data->usuario->nombre',
			    'filter'=>CHtml::listData(Usuario::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
