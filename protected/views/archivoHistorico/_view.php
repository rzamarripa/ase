	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->coleccion->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->volumen->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->expediente); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->Folio); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->UbicaciónFisica); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->NumeroPatrimonio); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaRecepcion_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaDigitalizacion_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fechaVerficacion_f); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->recepciono); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->digitalizo); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->verifico); ?>
		</td>
		*/ ?>
	</tr>