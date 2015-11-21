<?php
$this->pageCaption='Galería: '.$model->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';

?>

<div class="row">          
  <div class="col-lg-12">
		<?php	
			$fotos  = DetalleGaleria::model()->findAll("estatus_did  = 1 and galeria_did = " . $model->id); 			
			
			if(count($fotos)>0){ ?>
				<div class="row">	
					<div class='list-group gallery'>
						<?php foreach($fotos as $foto){ ?>		
							<div class='col-md-3 col-sm-4 col-xs-6 col-lg-3'>
								<a class="thumbnail fancybox" rel="ligthbox" href="<?php echo Yii::app()->baseUrl . "/administracion/images/uploads/tmp/" . $foto->ruta; ?>">
									<img class="img-responsive img-thumbnail" src="<?php echo Yii::app()->baseUrl . "/administracion/images/uploads/tmp/" . $foto->ruta; ?>"/>						
								</a>
							</div>
														
						<?php } ?>
					</div>
				</div>
		<?php	}	?>		
	</div>
</div>