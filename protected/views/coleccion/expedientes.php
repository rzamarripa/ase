<?php echo CHtml::dropDownList('expedientes','expe', 
				  array(),
				  array(
				    'empty'=>'Seleccione un Expediente',
						'class'=>'form-control col-lg-2',
				    'ajax' => array(
					    'type'=>'POST', 
					    'url'=>Yii::app()->createUrl('coleccion/verbotonexpediente'),
					    'update'=>'#botonExpediente',
							'data'=>array('id'=>'js:this.value'),
				))); ?>