<?php
$this->pageCaption='Actualizar DetalleGaleria '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Detalle Galeria'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar DetalleGaleria','url'=>array('index')),
	array('label'=>'Crear DetalleGaleria','url'=>array('create')),
	array('label'=>'Ver DetalleGaleria','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar DetalleGaleria','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>