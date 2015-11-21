
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'noticia-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,		
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); 
	$usuarioActual = Usuario::model()->obtenerUsuarioActual();
	?>

	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo $form->errorSummary($model); ?>
	<?php /* if($usuarioActual->tipoUsuario_did == 1){ ?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'seccion_did',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				<?php echo $form->dropDownList($model,'seccion_did',CHtml::listData(Seccion::model()->findAll("estatus_did = 1"), "id", "nombre"),array("class"=>"form-control")); ?>			
				<?php echo $form->error($model,'seccion_did'); ?>
			</div>
		</div>		
	<?php } */?>
	<div class="form-group">
		<?php echo $form->labelEx($up,'foto',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->FileField($up,'foto'); ?>
			<?php echo $form->error($up,'foto'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-3">
			<?php echo $form->textField($model,'titulo',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'mensaje',array('class'=>'control-label col-lg-2')); ?>
		<div class="col-lg-6">
			<?php echo $form->textArea($model,'mensaje',array('class'=>'form-control', 'id' =>'summernote')); ?>
			<?php echo $form->error($model,'mensaje'); ?>
		</div>
	</div>
	<?php /*if($usuarioActual->tipoUsuario_did == 1){ ?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'estatus_did',array('class'=>'control-label col-lg-2')); ?>
			<div class="col-lg-3">
				<?php echo $form->dropDownList($model,'estatus_did',CHtml::listData(Estatus::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			
				<?php echo $form->error($model,'estatus_did'); ?>
			</div>
		</div>
	<?php } */?>	
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