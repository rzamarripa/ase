<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='foro';
$this->breadcrumbs=array(
	'Foro'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar Foro','url'=>array('index')),
	array('label'=>'Crear Foro','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'foro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'autor',
		'titulo',
		'mensaje',
		'fecha_f',
		'respuestas',
		/*
		'identificador',
		'ult_respuesta',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array('name'=>'usuario_did',
		        'value'=>'$data->usuario->nombre',
			    'filter'=>CHtml::listData(Usuario::model()->findAll(), 'id', 'nombre'),),
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
