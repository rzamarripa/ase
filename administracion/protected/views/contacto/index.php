<?php
$this->pageCaption='Mensajes';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Nuevos';
$this->breadcrumbs=array(
	'Mensajes',
);
$c=0;
?>
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
		<table id="myTable" class="table table-striped table-bordered">
			<thead class="thead">
				<tr>
					<th class="col-lg-1">No.</th>
					<th class="col-lg-1">Nombre</th>
					<th class="col-lg-1">Correo</th>
					<th>Mensaje</th>
					<th class="col-lg-1">Estatus</th>
					<th class="col-lg-3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($mensajes as $mensaje){ $c++;  ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $mensaje->nombre . " " . $mensaje->apPaterno . " " . $mensaje->apMaterno;?></td>
					<td><?php echo $mensaje->correo;?></td>	
					<td><?php echo $mensaje->mensaje;?></td>	
					<td><?php echo ($mensaje->estatus_did == 1) ? '<span class="label label-success">No Leido</span>' :
	            							'<span class="label label-danger">Leido</span>'; ?></td>
					<td>
          	<?php echo CHtml::link('Ver',array('contacto/view','id'=>$mensaje->id),array('class'=>'btn btn-info btn-sm')); ?>            
						<?php echo ($mensaje->estatus_did == 1) ? 
												CHtml::link('Leido',array('contacto/cambiar','id'=>$mensaje->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
												CHtml::link('No Leido',array('contacto/cambiar','id'=>$mensaje->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>						
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
  </div>
</div>