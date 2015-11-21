<?php
$this->pageCaption='Ver ArchivoHistorico #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Archivo Historico'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar ArchivoHistorico','url'=>array('index')),
	array('label'=>'Crear ArchivoHistorico','url'=>array('create')),
	array('label'=>'Actualizar ArchivoHistorico','url'=>array('update','id'=>$model->id)),
	array('label'=>'Eliminar ArchivoHistorico','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar ArchivoHistorico','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		array(	'name'=>'coleccion_did',
			        'value'=>$model->coleccion->nombre,),
		array(	'name'=>'volumen_did',
			        'value'=>$model->volumen->nombre,),
		'expediente',
		'Folio',
		'UbicaciónFisica',
		'NumeroPatrimonio',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
		'recepciono',
		'digitalizo',
		'verifico',
	),
)); ?>
