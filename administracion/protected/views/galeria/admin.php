<?php
$this->pageCaption='Administrar ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='galeria';
$this->breadcrumbs=array(
	'Galeria'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Galeria','url'=>array('index')),
	array('label'=>'Crear Galeria','url'=>array('create')),
);

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'galeria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'descripcion',
		array('name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',
			    'filter'=>CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre'),),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
