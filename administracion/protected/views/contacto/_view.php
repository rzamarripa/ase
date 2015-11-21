	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->apPaterno); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->apMaterno); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->correo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->mensaje); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaCreacion_f); ?>
		</td>
	</tr>