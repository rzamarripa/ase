	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->autor); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->titulo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->mensaje); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fecha_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->respuestas); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->identificador); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->ult_respuesta); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->usuario->nombre); ?>
		</td>
		*/ ?>
	</tr>