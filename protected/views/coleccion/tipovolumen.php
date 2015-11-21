<?php 
if(isset($volumenes) && count($volumenes)>0){ ?>
	<table id="table" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Nombre del Volumen</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if(count($volumenes) > 0){
				foreach($volumenes as $volumen){
					if($volumen->tieneExpediente_did == 1){
						echo '<tr><td>' . 
								$volumen->nombre . 
							'</td><td class="text-center">' . CHtml::ajaxButton ("Ver Expedientes con Oliver",
										                              CController::createUrl('coleccion/verexp',array("id"=>$volumen->id)), 
										                              array('update' => '#exp'),
										                              array('class'=>'btn btn-warning','id'=>$volumen->id)) .
							'</td></tr>';
					}else{
						$idArchivo = ArchivoHistorico::model()->find("coleccion_did = :c and volumen_did = :v", array(":c" => $volumen->coleccion_did, ":v"=>$volumen->id));
						if(isset($idArchivo) && !empty($idArchivo)){
							echo '<tr><td>' . 
								$volumen->nombre . 
							'</td><td class="text-center">' . 
								CHtml::link("Ver Imágenes",array('coleccion/verimagenes', 'id'=>$idArchivo->id), array('target'=>'_blank', 'class'=>'btn btn-warning')) . 
							'</td></tr>';
						}else{
							echo '<tr><td>' . 
								$volumen->nombre . 
							'</td><td class="text-center"></td></tr>';
						}
					}
				}
			}
				
			?>			
		</tbody>
	</table>
<?php }else{
				echo "No hay volúmenes en esta colección todavía.";
			} ?>

<script>
	$(document).ready(function() {
    $('#table').dataTable();
} );
</script>