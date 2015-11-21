
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'archivo-historico-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo $form->errorSummary($model); ?>
		<div class="form-group">
		<?php echo $form->labelEx($model,'coleccion_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'coleccion_did',CHtml::listData(Coleccion::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'coleccion_did'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'volumen_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'volumen_did',CHtml::listData(Volumen::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'volumen_did'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'expediente',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'expediente',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'expediente'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Folio',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'Folio',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'Folio'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'UbicaciónFisica',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'UbicaciónFisica',array('size'=>-1,'maxlength'=>-1,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'UbicaciónFisica'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'NumeroPatrimonio',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'NumeroPatrimonio',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'NumeroPatrimonio'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'fechaRecepcion_f',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			
							<?php
							if ($model->fechaRecepcion_f!='') 
								$model->fechaRecepcion_f=date('d-m-Y',strtotime($model->fechaRecepcion_f));
							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>$model,
                   'attribute'=>'fechaRecepcion_f',
                   'value'=>$model->fechaRecepcion_f,
                   'language' => 'es',
                   'htmlOptions' => array('readonly'=>""),
                  'options'=> array(
									'dateFormat'=>'yy-mm-dd', 
									'altFormat'=>'dd-mm-yy', 
									'changeMonth'=>'true', 
									'changeYear'=>'true', 
									'showOn'=>'both',
									'buttonText'=>'<i class="icon-calendar"></i>'
								),)); ?>			<?php echo $form->error($model,'fechaRecepcion_f'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'fechaDigitalizacion_f',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			
							<?php
							if ($model->fechaDigitalizacion_f!='') 
								$model->fechaDigitalizacion_f=date('d-m-Y',strtotime($model->fechaDigitalizacion_f));
							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>$model,
                   'attribute'=>'fechaDigitalizacion_f',
                   'value'=>$model->fechaDigitalizacion_f,
                   'language' => 'es',
                   'htmlOptions' => array('readonly'=>""),
                  'options'=> array(
									'dateFormat'=>'yy-mm-dd', 
									'altFormat'=>'dd-mm-yy', 
									'changeMonth'=>'true', 
									'changeYear'=>'true', 
									'showOn'=>'both',
									'buttonText'=>'<i class="icon-calendar"></i>'
								),)); ?>			<?php echo $form->error($model,'fechaDigitalizacion_f'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'fechaVerficacion_f',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			
							<?php
							if ($model->fechaVerficacion_f!='') 
								$model->fechaVerficacion_f=date('d-m-Y',strtotime($model->fechaVerficacion_f));
							$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                   'model'=>$model,
                   'attribute'=>'fechaVerficacion_f',
                   'value'=>$model->fechaVerficacion_f,
                   'language' => 'es',
                   'htmlOptions' => array('readonly'=>""),
                  'options'=> array(
									'dateFormat'=>'yy-mm-dd', 
									'altFormat'=>'dd-mm-yy', 
									'changeMonth'=>'true', 
									'changeYear'=>'true', 
									'showOn'=>'both',
									'buttonText'=>'<i class="icon-calendar"></i>'
								),)); ?>			<?php echo $form->error($model,'fechaVerficacion_f'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'recepciono',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'recepciono'); ?>
			<?php echo $form->error($model,'recepciono'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'digitalizo',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'digitalizo'); ?>
			<?php echo $form->error($model,'digitalizo'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'verifico',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'verifico'); ?>
			<?php echo $form->error($model,'verifico'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
