<?php  if(count($detalles)>0){ ?>
<h2>Resultados de la Búsqueda</h2>
<table class="table table-striped table-bordered">
	<thead class="thead">
		<tr>
			<th>Folio</td>
			<th>Imagen</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($detalles as $detalle){?>
		<tr>
			<td><?php echo $detalle->folio;?></td>		
			<td><?php echo CHtml::link("Ver imagen", array("coleccion/verimagenes",'id'=>$detalle->id, 'c'=>1, 'res'=>'low'),array("target"=>"_blank","class"=>"btn btn-warning"));?></td>	
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php }else{ ?>
<h2>No se encontraron resultados</h2>
<?php } ?>
<?php //echo '<pre>';print_r($detalles);echo '</pre>';exit; ?>