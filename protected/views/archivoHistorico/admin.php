<?php
$this->pageCaption='Adminsitrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='archivo historico';
$this->breadcrumbs=array(
	'Archivo Historico'=>array('index'),
	'Adminsitrar',
);

$this->menu=array(
	array('label'=>'Listar ArchivoHistorico','url'=>array('index')),
	array('label'=>'Crear ArchivoHistorico','url'=>array('create')),
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'archivo-historico-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'coleccion_did',
		        'value'=>'$data->coleccion->nombre',
			    'filter'=>CHtml::listData(Coleccion::model()->findAll(), 'id', 'nombre'),),
		array('name'=>'volumen_did',
		        'value'=>'$data->volumen->nombre',
			    'filter'=>CHtml::listData(Volumen::model()->findAll(), 'id', 'nombre'),),
		'expediente',
		'Folio',
		'UbicaciónFisica',
		/*
		'NumeroPatrimonio',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		'fechaRecepcion_f',
		'fechaDigitalizacion_f',
		'fechaVerficacion_f',
		'recepciono',
		'digitalizo',
		'verifico',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
