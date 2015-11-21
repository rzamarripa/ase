<div class="row">
	<div class="col-sm-12 col-md-6 col-lg-4">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'evento-form',
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
			<div class="col-sm-12 col-md-6 col-lg-12">
				<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Título')); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
		</div>
		<br/>
		<div class="form-group">
			<div class="col-sm-12 col-md-6 col-lg-12">
				<?php echo $form->textArea($model,'descripcion',array('id'=>'summernote','placeholder'=>'Descripción')); ?>
				<?php echo $form->error($model,'descripcion'); ?>
			</div>
		</div>
		<br/>
		<div class="form-group">			
			<div class="col-sm-12 col-md-6 col-lg-12">
				<?php
						Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
						
							$this->widget('CJuiDateTimePicker',array(
								'model'=>$model,
	              'attribute'=>'fechaInicio_ft',	              
	              
	              'language' => 'es',
	              'options'=>array(
	              	'dateFormat'=>'yy/mm/dd',
	              	'buttonText'=>'<i class="fa fa-calendar"></i>',
			            'showAnim'=>'fold',
			            'showOn'=>'button',
		            ),
		            'htmlOptions' => array(
                  'style' => 'vertical-align:top'
                ),
	            ));?>			
				<?php echo $form->error($model,'fecha_ft'); ?>
			</div>
		</div>	
		<br/>
		<div class="form-group">			
			<div class="col-sm-12 col-md-6 col-lg-12">
				<?php
						Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
						
							$this->widget('CJuiDateTimePicker',array(
								'model'=>$model,
	              'attribute'=>'fechaFin_ft',	              
	              'language' => 'es',
	              'options'=>array(
	              	'dateFormat'=>'yy/mm/dd',
	              	'buttonText'=>'<i class="fa fa-calendar"></i>',
			            'showAnim'=>'fold',
			            'showOn'=>'button',
		            ),
		            'htmlOptions' => array(
                  'style' => 'vertical-align:top'
                ),
	            ));?>			
				<?php echo $form->error($model,'fecha_ft'); ?>
			</div>
		</div>	
		<br/>
		<div class="form-group">
			<div class="col-sm-12 col-md-6 col-lg-4">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
			)); ?>
			</div>
		</div>
	
	<?php $this->endWidget(); ?>

	</div>
	
</div>
	