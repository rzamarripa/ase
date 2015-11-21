<?php
$this->pageCaption='Crear Usuario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo usuario';

?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>