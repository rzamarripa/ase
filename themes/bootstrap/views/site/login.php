<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Sesión';
?>


<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-3 col-md-offset-4 col-lg-offset-4 well">
	<legend class="text-center">¿Quién eres?</legend>
	<?php 
		$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'login-form',
		  'type'=>'',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		));  
		echo $form->errorSummary($model);
	?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group">
				<?php echo $form->textField($model,'username',array('placeholder'=>'Usuario','class'=>'form-control')); ?>
				<?php echo $form->error($model,'usuario'); ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<div class="form-group">
				<?php echo $form->passwordField($model,'password',array('placeholder'=>'Contraseña','class'=>'form-control')); ?>
				<?php echo $form->error($model,'password'); ?>
				<label class="checkbox text-left">
				<?php echo $form->checkBox($model,'rememberMe'); ?><label>Recuérdame</label>
				</label>
				<button type="submit" name="submit" class="btn btn-warning btn-block">Iniciar Sesión</button>				
			</div>			
		</div>	
		<div class="">
			<?php echo CHtml::link('Olvidé la contraseña', array("site/recuperar")); ?>
		</div>			
	</div>
		<?php $this->endWidget(); ?>
	
	</div>
</div>