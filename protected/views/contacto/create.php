<?php
$this->pageCaption='Enviar comentario';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Al Administrador';
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>