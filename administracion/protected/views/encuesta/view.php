<?php
$this->pageCaption='Ver Encuesta -'.$model->nombre;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Encuesta'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('index')),
);

$c=0;
?>

<div class="row" style="padding-top:50px;">   
	<div class="col-lg-4">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'baseScriptUrl'=>false,
			'cssFile'=>false,
			'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
			'attributes'=>array(
				'id',
				'nombre',
				array('name'=>'estatus_did',
					    'value'=>$model->estatus->nombre,),
			),
		)); ?>
  </div>       
  <div class="col-lg-8">
		<table id="myTable" class="table table-striped table-bordered">
			<thead class="thead">
				<tr>
					<th>No.</th>					
					<th>Nombre</th>
					<th>Estatus</th>
					<th>Votos</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($respuestas as $respuesta){ $c++; ?>
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $respuesta->nombre;?></td>
					<td><?php echo ($respuesta->estatus_did == 1) ? '<span class="label label-success">' . $respuesta->estatus->tipo. '</span>' :
	            							'<span class="label label-danger">' . $respuesta->estatus->tipo . '</span>'; ?></td>
	        <td><?php echo $respuesta->votos;?></td>
					<td>
          	<?php echo CHtml::link('Ver',array('opcionesencuesta/view','id'=>$respuesta->id),array('class'=>'btn btn-info btn-sm')); ?>
            <?php echo CHtml::link('Editar',array('opcionesencuesta/update','id'=>$respuesta->id),array('class'=>'btn btn-success btn-sm')); ?>
						<?php echo ($respuesta->estatus_did == 1) ? 
												CHtml::link('No publicar',array('opcionesencuesta/cambiar','id'=>$respuesta->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
												CHtml::link('Publicar',array('opcionesencuesta/cambiar','id'=>$respuesta->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>						
          </td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
  </div>
</div>