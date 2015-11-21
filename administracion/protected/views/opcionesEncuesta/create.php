<?php
$this->pageCaption=$model->encuesta->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription=' - Respuesta';
$this->breadcrumbs=array(
	'Opciones Encuesta'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Volver a la encuesta','url'=>array('encuesta/index')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>