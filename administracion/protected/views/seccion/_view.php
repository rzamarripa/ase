	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::link('Editar',array('seccion/update','id'=>$data->id),array('class'=>'btn btn-success btn-sm')); ?>
			<?php echo CHtml::link('Eliminar',array('seccion/cambiar','id'=>$data->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')); ?>
		</td>
	</tr>