<?php
$this->pageCaption='Ver Carrusel #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Carrusel'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('index'))	
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'ruta',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); 
?>
<img src="<?php echo Yii::app()->baseUrl . '/images/carrusel/' . $model->ruta; ?>" width="800" />