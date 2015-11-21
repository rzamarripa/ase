<?php
$this->pageCaption='Encuesta';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar encuesta';
$this->breadcrumbs=array(
	'Encuesta',
);

$this->menu=array(
	array('label'=>'Crear Encuesta','url'=>array('create')),
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
					<th class="col-lg-1">Respuestas</th>
					<th>Nombre</th>
					<th class="col-lg-1">Fecha</th>
					<th class="col-lg-1">Estatus</th>
					<th class="col-lg-3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($encuestas as $encuesta){ $c++; $respuestas = OpcionesEncuesta::model()->count("encuesta_did = " . $encuesta->id); ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo '<span class="label label-success">' . $respuestas . '</span>' . CHtml::link('<span class="glyphicon glyphicon-plus"></span>',array('opcionesEncuesta/create','id'=>$encuesta->id),array('class'=>'btn btn-success btn-sm')); ?></td>
					<td><?php echo $encuesta->nombre;?></td>
					<td><?php echo date("d-m-Y", strtotime($encuesta->fecha_f));?></td>	
					<td><?php echo ($encuesta->estatus_did == 1) ? '<span class="label label-success">' . $encuesta->estatus->tipo. '</span>' :
	            							'<span class="label label-danger">' . $encuesta->estatus->tipo . '</span>'; ?></td>
					<td>
          	<?php echo CHtml::link('Ver',array('encuesta/view','id'=>$encuesta->id),array('class'=>'btn btn-info btn-sm')); ?>
            <?php echo CHtml::link('Editar',array('encuesta/update','id'=>$encuesta->id),array('class'=>'btn btn-success btn-sm')); ?>
						<?php echo ($encuesta->estatus_did == 1) ? 
												CHtml::link('No publicar',array('encuesta/cambiar','id'=>$encuesta->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
												CHtml::link('Publicar',array('encuesta/cambiar','id'=>$encuesta->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>						
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
  </div>
</div>