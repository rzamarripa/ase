<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='usuario';
$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar Usuario','url'=>array('index')),
	array('label'=>'Crear Usuario','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'apPaterno',
		'apMaterno',
		'profesion',
		'domCalle',
		/*
		'domNo',
		'domColonia',
		'domCP',
		'domMunicipio',
		'domCiudad',
		'domEstado',
		'domPais',
		'telefono',
		'celular',
		'empresa',
		'tema',
		'usuario',
		'contrasena',
		'foto',
		array('name'=>'tipoUsuario_did',
		        'value'=>'$data->tipoUsuario->nombre',
			    'filter'=>CHtml::listData(TipoUsuario::model()->findAll(), 'id', 'nombre'),),
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		'fechaCreacion_f',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
