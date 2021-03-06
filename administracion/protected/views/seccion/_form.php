
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'seccion-form',
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
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label col-sm-2')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'url',array('class'=>'control-label col-sm-2')); ?>
		<div class="col-sm-3">
			<?php echo $form->textField($model,'url',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'url'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-sm-2')); ?>
		<div class="col-sm-3">
			<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), "id", "tipo"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'estatus_did'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
