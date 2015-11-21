<?php if(isset($volumenes) && count($volumenes)>0){ ?>
	<table id="table" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Mes Inicial</th>
				<th>Año Inicial</th>
				<th>Mes Final</th>
				<th>Año Final</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php 				
				foreach($volumenes as $volumen){					
					$idArchivo = ArchivoHistorico::model()->find("coleccion_did = :c and volumen_did = :v", array(":c" => $volumen->coleccion_did, ":v"=>$volumen->id));
					if(isset($idArchivo) && !empty($idArchivo)){
						
						echo '<tr>
									<td>' . $volumen->mesInicial . '</td>
									<td>' . $volumen->anoInicial . '</td>
									<td>' . $volumen->mesFinal . '</td>
									<td>' . $volumen->anoFinal . '</td>
									<td class="text-center">' . CHtml::link("Ver",array('coleccion/verimagenes', 'id'=>$idArchivo->id), array('target'=>'_blank', 'class'=>'btn btn-warning')) . '</td>
								</tr>';
					}else{
						echo '<tr>
									<td>' . $volumen->mesInicial . '</td>
									<td>' . $volumen->anoInicial . '</td>
									<td>' . $volumen->mesFinal . '</td>
									<td>' . $volumen->anoFinal . '</td>
									<td class="text-center"></td>
								</tr>';
					}
					
				}				
			?>
			
		</tbody>
	</table>
<?php } else{
				echo "No hay volúmenes en esta colección todavía.";
			} ?>

<script>
	$(document).ready(function() {
    $('#table').dataTable();
} );
</script>