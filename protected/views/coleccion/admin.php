<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='coleccion';
$this->breadcrumbs=array(
	'Coleccion'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar Coleccion','url'=>array('index')),
	array('label'=>'Crear Coleccion','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'coleccion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array('name'=>'tipoClasificacion_did',
		        'value'=>'$data->tipoClasificacion->nombre',
			    'filter'=>CHtml::listData(TipoClasificacion::model()->findAll(), 'id', 'nombre'),),
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		'fechaCreacion_f',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
