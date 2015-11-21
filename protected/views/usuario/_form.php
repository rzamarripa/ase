
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'usuario-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>true,
	)); ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Beneficios</h4>	
		Al registrarse en nuestro potal usted podrá presentar publicaciónes sobre los temas de contenido histórico de Monterrey, recibir noticias y participar en foros de discusión..
	</div>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
	</div>	
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-lg-3 text-center">
			<?php
				if(isset($model->foto)) {
					echo CHtml::link('<img class="img-polaroid" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'administracion/fotos' . DIRECTORY_SEPARATOR . $model->foto . '" alt="' . $model->nombre . '" width=200 height=200/>',array('usuario/subir','id' =>$model->id));
					echo '<div class="alert alert-warning">
						<p><strong>Click en la imagen para agregar foto de perfil</strong></p>
					</div>';
				}
				else if(isset($model->id)){
					echo CHtml::link('<img class="img-polaroid" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'administracion/fotos' . DIRECTORY_SEPARATOR . 'desconocido.jpeg' . '" alt="' . $model->nombre . '" width=200 height=200/>',array('usuario/subir','id' =>$model->id));	
					echo '<div class="alert alert-warning">
						<p><strong>Click en la imagen para agregar foto de perfil</strong></p>
					</div>';			
				}
				else
				{
					'<div class="alert alert-warning">
						<p><strong>Una vez que se haya registrado podrá subir la foto</strong></p>
					</div>';
				}
				?>
		</div>
	</div>
	<div class="row">		
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
			<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
			<?php echo $form->labelEx($model,'apPaterno',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'apPaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'apPaterno'); ?>
			</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
			<?php echo $form->labelEx($model,'apMaterno',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'apMaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'apMaterno'); ?>
			</div>
		</div>
	</div>
	<?php // Dirección ?>
	<div class="row">
		<div class="col-xs-4 col-sm-5 col-md-5 col-lg-5 text-center">
			<?php echo $form->labelEx($model,'domCalle',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domCalle',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domCalle'); ?>
			</div>
		</div>
		<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 text-center">
			<?php echo $form->labelEx($model,'domNo',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domNo',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domNo'); ?>
			</div>
		</div>
		<div class="col-xs-4 col-sm-5 col-md-5 col-lg-5 text-center">
			<?php echo $form->labelEx($model,'domColonia',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domColonia',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domColonia'); ?>
			</div>
		</div>
		<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 text-center">
			<?php echo $form->labelEx($model,'domCP',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domCP',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domCP'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'domMunicipio',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domMunicipio',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domMunicipio'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'domCiudad',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domCiudad',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domCiudad'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'domEstado',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domEstado',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domEstado'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'domPais',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'domPais',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'domPais'); ?>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'usuario',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'usuario',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'usuario'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'contrasena',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->passwordField($model,'contrasena',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'contrasena'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'telefono',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'telefono',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'telefono'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3 text-center">
			<?php echo $form->labelEx($model,'celular',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'celular',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'celular'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3 col-sm-6 col-md-4 col-lg-4 text-center">
			<?php echo $form->labelEx($model,'correo',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'correo',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'correo'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-4 col-lg-4 text-center">
			<?php echo $form->labelEx($model,'empresa',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'empresa',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'empresa'); ?>
			</div>
		</div>
		<div class="col-xs-3 col-sm-6 col-md-4 col-lg-4 text-center">
			<?php echo $form->labelEx($model,'profesion',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'profesion',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'profesion'); ?>
			</div>
		</div>		
		<div class="col-xs-3 col-sm-6 col-md-4 col-lg-4 text-center">
			<?php echo $form->labelEx($model,'tema',array('class'=>'control-label')); ?>
			<div class="form-group">
				<?php echo $form->textField($model,'tema',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'tema'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<div class="form-group">
				<div class="pull-right">
					<?php echo CHtml::checkbox('noticias',true,array('id'=>'noticias','class'=>'checkbox_class')); ?> Deseo recibir noticias.
				</div> 
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<div class="form-group">
				<div class="pull-right">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Registrar' : 'Actualizar Perfil',
				)); ?>
				</div>
			</div>
		</div>
	</div>
	

<?php $this->endWidget(); ?>
<p>"La información otorgada será protegida conforme lo dispone la Ley de Transparencia y Acceso a la Información del Estado de Nuevo León y se utilizará únicamente para los fines descritos en esta página."</p>