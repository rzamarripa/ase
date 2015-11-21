<?php
$this->pageCaption='Administrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='detalle galeria';
$this->breadcrumbs=array(
	'Detalle Galeria'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar DetalleGaleria','url'=>array('index')),
	array('label'=>'Crear DetalleGaleria','url'=>array('create')),
);

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'detalle-galeria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'galeria_did',
		        'value'=>'$data->galeria->nombre',
			    'filter'=>CHtml::listData(Galeria::model()->findAll(), 'id', 'nombre'),),
		'ruta',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
