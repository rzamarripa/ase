<?php
$this->pageCaption='';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';

?>
<div class="row">	
	<?php 
		foreach($galerias as $galeria){ 
			$detalle = DetalleGaleria::model()->find("galeria_did = :g and estatus_did = 1",array(":g" =>$galeria->id));
			if(count($detalle)>0){
				echo CHtml::link("<div class='col-md-3 col-sm-4 col-xs-6'>
					<img class='img-responsive img-thumbnail' src='" . Yii::app()->baseUrl . "/administracion/images/uploads/tmp/" . $detalle->ruta . "'/>
					<p class='lead' style='margin-bottom:0px;'>" . $galeria->nombre . "</p>
					<small>" . $galeria->descripcion . "</small>
				</div>",array('galeria/view','id'=>$galeria->id));
			}
		 } ?>
</div>