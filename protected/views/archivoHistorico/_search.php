<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'coleccion_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,"coleccion_did",CHtml::listData(Coleccion::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'volumen_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,"volumen_did",CHtml::listData(Volumen::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'expediente'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'expediente',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'Folio'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'Folio',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'UbicaciónFisica'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'UbicaciónFisica',array('size'=>-1,'maxlength'=>-1,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'NumeroPatrimonio'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'NumeroPatrimonio',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'estatus_did'); ?>
		<div class="input">
			
			<?php echo $form->dropDownList($model,"estatus_did",CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fechaRecepcion_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fechaRecepcion_f!='') 
						$fechaRecepcion_f=date('d-m-Y',strtotime($fechaRecepcion_f));
					else
						$fechaRecepcion_f=date('d-m-Y');
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fechaRecepcion_f',
					                                       'value'=>$fechaRecepcion_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$fechaRecepcion_f,
					                                               'dateFormat'=>'yy-mm-dd',
					                                               'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
					                                               'buttonImageOnly'=>true,
					                                               'buttonText'=>'Fecha',
					                                               'selectOtherMonths'=>true,
					                                               'showAnim'=>'slide',
					                                               'showButtonPanel'=>true,
					                                               'showOn'=>'button',
					                                               'showOtherMonths'=>true,
					                                               'changeMonth' => 'true',
					                                               'changeYear' => 'true',
					                                               'minDate'=>"-70Y", //fecha minima
					                                               'maxDate'=> "+10Y", //fecha maxima
					                                       ),)); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fechaDigitalizacion_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fechaDigitalizacion_f!='') 
						$fechaDigitalizacion_f=date('d-m-Y',strtotime($fechaDigitalizacion_f));
					else
						$fechaDigitalizacion_f=date('d-m-Y');
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fechaDigitalizacion_f',
					                                       'value'=>$fechaDigitalizacion_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$fechaDigitalizacion_f,
					                                               'dateFormat'=>'yy-mm-dd',
					                                               'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
					                                               'buttonImageOnly'=>true,
					                                               'buttonText'=>'Fecha',
					                                               'selectOtherMonths'=>true,
					                                               'showAnim'=>'slide',
					                                               'showButtonPanel'=>true,
					                                               'showOn'=>'button',
					                                               'showOtherMonths'=>true,
					                                               'changeMonth' => 'true',
					                                               'changeYear' => 'true',
					                                               'minDate'=>"-70Y", //fecha minima
					                                               'maxDate'=> "+10Y", //fecha maxima
					                                       ),)); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'fechaVerficacion_f'); ?>
		<div class="input">
			
			<?php
					if ($model->fechaVerficacion_f!='') 
						$fechaVerficacion_f=date('d-m-Y',strtotime($fechaVerficacion_f));
					else
						$fechaVerficacion_f=date('d-m-Y');
					$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                       'model'=>$model,
					                                       'attribute'=>'fechaVerficacion_f',
					                                       'value'=>$fechaVerficacion_f,
					                                       'language' => 'es',
					                                       'htmlOptions' => array('readonly'=>"readonly"),
					                                       'options'=>array(
					                                               'autoSize'=>true,
					                                               'defaultDate'=>$fechaVerficacion_f,
					                                               'dateFormat'=>'yy-mm-dd',
					                                               'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
					                                               'buttonImageOnly'=>true,
					                                               'buttonText'=>'Fecha',
					                                               'selectOtherMonths'=>true,
					                                               'showAnim'=>'slide',
					                                               'showButtonPanel'=>true,
					                                               'showOn'=>'button',
					                                               'showOtherMonths'=>true,
					                                               'changeMonth' => 'true',
					                                               'changeYear' => 'true',
					                                               'minDate'=>"-70Y", //fecha minima
					                                               'maxDate'=> "+10Y", //fecha maxima
					                                       ),)); ?>		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'recepciono'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'recepciono'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'digitalizo'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'digitalizo'); ?>
		</div>
	</div>


	<div class="clearfix">
		<?php echo $form->label($model,'verifico'); ?>
		<div class="input">
			
			<?php echo $form->textField($model,'verifico'); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
