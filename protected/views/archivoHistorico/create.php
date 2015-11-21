<?php
$this->pageCaption='Crear ArchivoHistorico';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo archivohistorico';
$this->breadcrumbs=array(
	'Archivo Historico'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'Listar ArchivoHistorico','url'=>array('index')),
	array('label'=>'Administrar ArchivoHistorico','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>