
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'contacto-form',
		'type'=>'inline',
		'enableAjaxValidation'=>false,
	)); ?>

	
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')); ?>
				<div class="col-lg-3">
					<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'nombre'); ?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'apPaterno',array('class'=>'control-label')); ?>
				<div class="col-lg-3">
					<?php echo $form->textField($model,'apPaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'apPaterno'); ?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'apMaterno',array('class'=>'control-label')); ?>
				<div class="col-lg-3">
					<?php echo $form->textField($model,'apMaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'apMaterno'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group">
				<?php echo $form->labelEx($model,'correo',array('class'=>'control-label')); ?>
				<div class="col-lg-3">
					<?php echo $form->textField($model,'correo',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'correo'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group">
				<?php echo $form->labelEx($model,'mensaje',array('class'=>'control-label')); ?>
				<div class="col-lg-3">
					<?php echo $form->textArea($model,'mensaje',array('rows'=>6, 'cols'=>50)); ?>
					<?php echo $form->error($model,'mensaje'); ?>
				</div>
			</div>
		</div>
	</div>	
	<div class="form-group">
		<div class="col-lg-2 col-lg-offset-10">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'plane',
			'label'=>$model->isNewRecord ? 'Crear' : 'Enviar',
		)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
