<?php
$this->pageCaption='Actualizar Foro '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Foro'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
if(isset($_GET["id"]))
	$this->menu=array(
		array('label'=>'Volver','url'=>array('view','id'=>$model->id)),
	);
else
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index')),
	);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>