<?php
$this->pageCaption='Emailing ';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Emailing'=>array('index'),
	'Enviar',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('index')),
);
?>

<div class="row">
	<div class="col-sm-6 col-md-2 col-lg-2">
    <div class="hero-widget well well-sm">
      <div class="icon">
				<i class="glyphicon glyphicon-user"></i>
      </div>
      <div class="text">
				<var><?php echo count($contactos); ?></var>
				<label class="text-muted">Registrados</label>
      </div>
      <div class="options">
      	<?php echo CHtml::link('<i class="glyphicon glyphicon-plus"></i> Agregar Contacto',array('email/create'),array("class"=>"btn btn-primary")); ?>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-10 col-lg-10">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'enviar-form',
			'type'=>'horizontal',
			'enableAjaxValidation'=>false,
		)); ?>
		
			<div class="form-group well-sm well">
				<h3>Seleccione quienes rebirán el Correo</h3>		
				<span class="col-sm-12 col-md-6 col-lg-6">
					<span class="col-sm-2 col-lg-1">
						<input type="checkbox" name="select-all" id="select-all" /></span>
						<span  class="col-sm-4 col-lg-5"><strong>Seleccionar Todos</strong></span>
					</span>					 
				<?php		        
	        echo $form->checkBoxList($model,'correo', 
	        		CHtml::listData($contactos,'correo','correo'),
	        		array("template" =>'<span class="col-sm-12 col-md-6 col-lg-6"><span class="col-sm-2 col-lg-1">{input}</span><span  class="col-sm-4 col-lg-5">{label}</span></span>',
	                    "separator" => "",	                    
	                    "style" => "width: 20px;",
	                    "data-toggle"=>"foo"	                    
	                ));	
	        echo $form->error($model,'correo');
        ?>
		  </div>
		  <div class="form-group well well-sm">
				<h3>Escriba el cuerpo del mensaje</h3>
				<div class="col-lg-12">
					<?php echo CHtml::textArea("mensaje",'',array('id'=>'summernote','style'=>'height:300px;')); ?>
				</div>
			</div>
		  <div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'info',
					'icon' => 'glyphicon glyphicon-send',
					'label'=>' Enviar',
				)); ?>
				</div>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#select-all').click(function(event) {   
		    if(this.checked) {
		        $(':checkbox').each(function() {
		            this.checked = true;                        
		        });
		    }else{
		    	$(':checkbox').each(function() {
		            this.checked = false;                        
		        });
		    }
		});
	  $('#summernote').summernote({
		  height: 150,
	  });
	});
</script>
