<?php
$this->pageCaption='Ver DetalleGaleria #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Detalle Galeria'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar DetalleGaleria','url'=>array('index')),
	array('label'=>'Crear DetalleGaleria','url'=>array('create')),
	array('label'=>'Actualizar DetalleGaleria','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar DetalleGaleria','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar DetalleGaleria','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'galeria_did',
			        'value'=>$model->galeria->nombre,),
		'ruta',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>

