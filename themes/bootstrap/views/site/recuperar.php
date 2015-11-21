<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Recuperar';
?>


<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-3 col-md-offset-4 col-lg-offset-4 well">
	<legend class="text-center">¿Olvidé mi contraseña?</legend>
	<?php 
		$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'login-form',
		  'type'=>'',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		));  
	?>
	<div class="row">		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<div class="form-group">
				<?php echo $form->textField($model,'correo',array('placeholder'=>'Escribe tu Correo','class'=>'form-control')); ?>
				<?php echo $form->error($model,'correo'); ?>
				<button type="submit" name="submit" class="btn btn-warning btn-block" style="margin-top:20px">Recuperar Contraseña</button>				
			</div>			
		</div>	
	</div>
		<?php $this->endWidget(); ?>
	
	</div>
</div>