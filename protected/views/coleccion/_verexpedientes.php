<label for="expedientes">Expedientes</label>
<div class="form-group">
<?php 
	
	$expedientes=Expediente::model()->findAll('volumenAño_did=:id',array(':id'=>(int) $volumen->id));			
	$expedientesArray=CHtml::listData($expedientes,'id','nombre');

	 
?>
</div>