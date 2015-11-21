
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'contacto-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
			<div class="form-group">
				
					<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=> 'Nombre*')); ?>
					<?php echo $form->error($model,'nombre'); ?>
				
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-lg-offset-1">
			<div class="form-group">
				
					<?php echo $form->textField($model,'apPaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=> 'Apellido Paterno*')); ?>
					<?php echo $form->error($model,'apPaterno'); ?>
				
			</div>		
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-offset-1">
			<div class="form-group">
			
					<?php echo $form->textField($model,'apMaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=> 'Apellido Materno')); ?>
					<?php echo $form->error($model,'apMaterno'); ?>
			
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group">
					<?php echo $form->textField($model,'correo',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=> 'Correo*')); ?>
					<?php echo $form->error($model,'correo'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group">

					<?php echo $form->textArea($model,'mensaje',array('rows'=>6, 'cols'=>171,'placeholder'=> 'Mensaje*')); ?>
					<?php echo $form->error($model,'mensaje'); ?>

			</div>
		</div>
	</div>	
	
	<div class="form-group">
		<div class="col-lg-2 col-lg-offset-10">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
