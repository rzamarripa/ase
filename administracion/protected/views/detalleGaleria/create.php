<?php
$this->pageCaption='Crear DetalleGaleria';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo detallegaleria';
$this->breadcrumbs=array(
	'Detalle Galeria'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar DetalleGaleria','url'=>array('index')),
	array('label'=>'Administrar DetalleGaleria','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>