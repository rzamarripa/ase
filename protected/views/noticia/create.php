<?php

$this->pageCaption=($_GET["tipo"] == "not") ? 'Crear Noticia' : 'Crear Publicación';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription=($_GET["tipo"] == "not") ? 'Crear nueva Noticia' : 'Crear nueva Publicación';

?>


<?php echo $this->renderPartial('_form', array('model'=>$model, 'foto' => $foto)); ?>