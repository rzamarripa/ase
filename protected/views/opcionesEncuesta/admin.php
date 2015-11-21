<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='opciones encuesta';
$this->breadcrumbs=array(
	'Opciones Encuesta'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar OpcionesEncuesta','url'=>array('index')),
	array('label'=>'Crear OpcionesEncuesta','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'opciones-encuesta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array('name'=>'encuesta_did',
		        'value'=>'$data->encuesta->nombre',
			    'filter'=>CHtml::listData(Encuesta::model()->findAll(), 'id', 'nombre'),),
		'votos',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
