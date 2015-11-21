<?php
$this->pageCaption='Ver Galeria #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Galeria'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver a Galerías','url'=>array('index')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		array(	'name'=>'estatus_did',
			        'value'=>$model->estatus->nombre,),
	),
)); ?>

<div class="row">          
  <div class="col-lg-12">
		<?php	
			$fotos  = DetalleGaleria::model()->findAll("galeria_did = " . $model->id); 			
		?>
		<hr>
		<?php if(count($fotos)>0){ ?>
	    <div class="container">
				<div class="row">	
						<?php foreach($fotos as $foto){ ?>							
							<img class="img-responsive img-thumbnail col-lg-3" src="<?php echo Yii::app()->baseUrl . "/images/uploads/tmp/" . $foto->ruta; ?>"/>								
						<?php } ?>
				</div>
			</div>
		<?php	}	?>		
	</div>
</div>