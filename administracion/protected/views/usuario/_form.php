<?php 
	$usuarioActual = Usuario::model()->find("usuario = '" . Yii::app()->user->name . "'");
?>
<div class="row well">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'usuario-form',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Instrucciones</h4>	
		Los campos con <span class="required">*</span> son requeridos.
   </div>
	<div class="col-lg-3 text-center">
		<?php
			if(isset($model->foto)) {
				echo CHtml::link('<img class="img-polaroid" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . $model->foto . '" alt="' . $model->nombre . '" width=200 height=200/>',array('usuario/subir','id' =>$model->id));
				echo '<div class="alert alert-warning">
					<p><strong>Click en la imagen para agregar foto de perfil</strong></p>
				</div>';
			}
			else if(isset($model->id)){
				echo CHtml::link('<img class="img-polaroid" src="' . Yii::app()->baseUrl . DIRECTORY_SEPARATOR . 'fotos' . DIRECTORY_SEPARATOR . 'desconocido.jpeg' . '" alt="' . $model->nombre . '" width=200 height=200/>',array('usuario/subir','id' =>$model->id));	
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
	<?php $this->endWidget(); ?>
	<div class="col-lg-9">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'usuario-form',
			'type'=>'horizontal',
			'enableAjaxValidation'=>false,
		)); ?>	
		<?php echo $form->errorSummary($model); ?>
		<div class="form-group">
			<?php echo $form->labelEx($model,'usuario',array('class'=>'control-label col-lg-1')); ?>
			<div class="col-lg-3">
				<?php echo $form->textField($model,'usuario',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Usuario')); ?>
				<?php echo $form->error($model,'usuario'); ?>
			</div>
			<div class="col-lg-3">
				<?php echo $form->passwordField($model,'contrasena',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Contraseña')); ?>
				<?php echo $form->error($model,'contrasena'); ?>
			</div>			
		</div>
		<hr>
		<div class="form-group">
			<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label col-lg-1')); ?>
			<div class="col-lg-3">
				<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-2','placeholder'=>'Nombre')); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
			<div class="col-lg-3">
				<?php echo $form->textField($model,'apPaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-2','placeholder'=>'Apellido Paterno')); ?>
				<?php echo $form->error($model,'apPaterno'); ?>
			</div>
			<div class="col-lg-2">
				<?php echo $form->textField($model,'apMaterno',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-2','placeholder'=>'Apellido Materno')); ?>
				<?php echo $form->error($model,'apMaterno'); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'Domicilio',array('class'=>'control-label col-lg-1')); ?>
			<div class="col-lg-3">
				<?php echo $form->textField($model,'domCalle',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-2','placeholder'=>'Calle')); ?>
				<?php echo $form->error($model,'domCalle'); ?>
			</div>
			<div class="col-lg-1">
				<?php echo $form->textField($model,'domNo',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-2','placeholder'=>'Número')); ?>
				<?php echo $form->error($model,'domNo'); ?>
			</div>
			<div class="col-lg-3">
				<?php echo $form->textField($model,'domColonia',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-2','placeholder'=>'Colonia')); ?>
				<?php echo $form->error($model,'domColonia'); ?>
			</div>
			<div class="col-lg-1">
				<?php echo $form->textField($model,'domCP',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-1','placeholder'=>'CP')); ?>
				<?php echo $form->error($model,'domCP'); ?>
			</div>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'',array('class'=>'control-label col-lg-1')); ?>
			<div class="col-lg-2">
				<?php echo $form->textField($model,'domMunicipio',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-1','placeholder'=>'Municipio')); ?>
				<?php echo $form->error($model,'domMunicipio'); ?>
			</div>
			<div class="col-lg-2">
				<?php echo $form->textField($model,'domCiudad',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-1','placeholder'=>'Ciudad')); ?>
				<?php echo $form->error($model,'domCiudad'); ?>
			</div>
			<div class="col-lg-2">
				<?php echo $form->textField($model,'domEstado',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-1','placeholder'=>'Estado')); ?>
				<?php echo $form->error($model,'domEstado'); ?>
			</div>
			<div class="col-lg-2">
				<?php echo $form->textField($model,'domPais',array('size'=>50,'maxlength'=>50,'class'=>'form-control col-lg-1','placeholder'=>'País')); ?>
				<?php echo $form->error($model,'domPais'); ?>
			</div>
		</div>		
		<div class="form-group">
			<?php echo $form->labelEx($model,'Comunicación',array('class'=>'control-label col-lg-1')); ?>
			<div class="col-lg-4">
				<?php echo $form->textField($model,'telefono',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Teléfono')); ?>
				<?php echo $form->error($model,'telefono'); ?>
			</div>
			<div class="col-lg-4">
				<?php echo $form->textField($model,'celular',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Celular')); ?>
				<?php echo $form->error($model,'celular'); ?>
			</div>					
		</div>
		<hr>
		<div class="form-group">
			<?php echo $form->labelEx($model,'tema',array('class'=>'control-label col-lg-1')); ?>
			<div class="col-lg-3">
				<?php echo $form->textField($model,'empresa',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Empresa')); ?>
				<?php echo $form->error($model,'empresa'); ?>
			</div>				
			<div class="col-lg-2">
				<?php echo $form->textField($model,'profesion',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Profesión')); ?>
				<?php echo $form->error($model,'profesion'); ?>
			</div>
			<div class="col-lg-3">
				<?php echo $form->textField($model,'tema',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Tema de interés')); ?>
				<?php echo $form->error($model,'tema'); ?>
			</div>
		</div>	
		<div class="form-group">
			<?php echo $form->labelEx($model,'tipoUsuario_did',array('class'=>'control-label col-lg-1')); ?>
			<div class="col-lg-3">
				<?php echo $form->dropDownList($model,'tipoUsuario_did',CHtml::listData(TipoUsuario::model()->findAll(), "id", "nombre"),array("class"=>"form-control")); ?>			<?php echo $form->error($model,'tipoUsuario_did'); ?>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-10">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
			)); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>
