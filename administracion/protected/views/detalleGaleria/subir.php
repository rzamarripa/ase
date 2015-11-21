<?php
$this->pageCaption='Subir fotos de ' . $galeria->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Foto Galerías',
);

$this->menu=array(
	array('label'=>'Volver a la Galería','url'=>array('galeria/index')),
);

?>
<br/>
<style>
	img {
  filter: gray; /* IE6-9 */
  -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
    -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
    margin-bottom:20px;
}
img:hover {
  filter: none; /* IE6-9 */
  -webkit-filter: grayscale(0); /* Google Chrome, Safari 6+ & Opera 15+ */
}
</style>
<div class="row">          
  <div class="col-lg-12">
		<?php	
			$fotos  = DetalleGaleria::model()->findAll("galeria_did = " . $galeria->id); 
			$this->widget('xupload.XUpload', array(
		    'url' => Yii::app()->createUrl("detalleGaleria/upload",array('id'=>$galeria->id)),
		    'model' => $model,
		    'attribute' => 'file',
		    'multiple' => true,
			));	
		?>
		<hr>
		<?php if(count($fotos)>0){ ?>
	    <div class="container">
				<div class="row">							
					<table id="myTable" class="table table-bordered display">
						<thead class="thead">
							<tr>
								<th class="text-center">Foto</th>
								<th class="text-center" class="col-lg-1">Estatus</th>
								<th class="text-center" class="col-lg-1">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($fotos as $foto){ ?>
							<tr>
								<td>
									<img class="img-responsive" src="<?php echo Yii::app()->baseUrl . "/images/uploads/tmp/" . $foto->ruta; ?>" width="100" heigth="100"/>
								</td>
								<td class="text-center">
									<span class="label label-<?php echo ($foto->estatus_did == 1) ? "success" : "warning"; ?>"><?php echo $foto->estatus->nombre;?></span>
								</td>
								<td class="text-center">
									<?php 
										if($foto->estatus_did == 1) 
											echo CHtml::link('Desactivar',array('cambiar','id'=>$foto->id, 'estatus'=>2),array('class'=>'btn btn-warning')); 
										else
											echo CHtml::link('Activar',array('cambiar','id'=>$foto->id, 'estatus'=>1),array('class'=>'btn btn-success')); 
										
										echo CHtml::link('Eliminar',array('eliminar','id'=>$foto->id),array('class'=>'btn btn-danger')); ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>							   
				</div>
			</div>
		<?php	}	?>		
	</div>
</div>