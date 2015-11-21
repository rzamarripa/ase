<?php
$this->pageCaption='Carrusel';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar carrusel';
$this->breadcrumbs=array(
	'Carrusel',
);

$this->menu=array(
	array('label'=>'Crear Carrusel','url'=>array('create')),
);
$respuestas = 0;
$c = 0;
?>
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
		<table id="myTable" class="table table-striped table-bordered">
			<thead class="thead">
				<tr>
					<th class="col-lg-1">No.</th>
					<th class="col-lg-1">Nombre</th>
					<th >Descripción</th>
					<th class="col-lg-1">Estatus</th>
					<th class="col-lg-3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($carruseles as $carrusel){ $c++;  ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $carrusel->nombre;?></td>
					<td><?php echo $carrusel->descripcion;?></td>	
					<td><?php echo ($carrusel->estatus_did == 1) ? '<span class="label label-success">' . $carrusel->estatus->tipo. '</span>' :
	            							'<span class="label label-danger">' . $carrusel->estatus->tipo . '</span>'; ?></td>
					<td>
          	<?php echo CHtml::link('Ver',array('carrusel/view','id'=>$carrusel->id),array('class'=>'btn btn-info btn-sm')); ?>
            <?php echo CHtml::link('Editar',array('carrusel/update','id'=>$carrusel->id),array('class'=>'btn btn-success btn-sm')); ?>
						<?php echo ($carrusel->estatus_did == 1) ? 
												CHtml::link('No publicar',array('carrusel/cambiar','id'=>$carrusel->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
												CHtml::link('Publicar',array('carrusel/cambiar','id'=>$carrusel->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>						
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
  </div>
</div>