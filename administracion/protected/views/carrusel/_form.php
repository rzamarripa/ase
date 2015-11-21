
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'carrusel-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>

	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo $form->errorSummary($model); ?>
		<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcion',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($up,'foto',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->FileField($up,'foto'); ?>
			<?php echo $form->error($up,'foto'); ?>
		</div>
	</div>	
	<div class="form-group">
		<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'estatus_did'); ?>
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
