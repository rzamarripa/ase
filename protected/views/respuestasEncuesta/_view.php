	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->encuesta->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->respuesta->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->ip); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaCreacion_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->usuario->nombre); ?>
		</td>
	</tr>