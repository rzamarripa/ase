<?php
$this->pageCaption='';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';

?>
<style>
	div .col-lg-8 {
    background-color: white;
    padding-top: 10px;
    padding-bottom: 10px;
	}
</style>
<div class="row">
	<div class="col-lg-8">
		<div id='calendar'></div>
	</div>
	<div class="col-lg-4">
		<h4 class="text-center">Listado de eventos</h4>		
		<?php foreach($eventos as $evento){ 
						$fechaActual = new DateTime(date("Y-m-d H:i:s")); 
						$fechaInicioEvento = new DateTime(date('Y-m-d H:i:s', strtotime ($evento->fechaInicio_ft)));						
						$intervalo = $fechaInicioEvento->diff($fechaActual);
						$meses = (($intervalo->format('%y') * 12) + $intervalo->format('%m'));
						//echo $diff->format('%R'); // use for point out relation: smaller/greater
   					//echo $diff->days;		   					
						// echo (($diff->format('%y') * 12) + $diff->format('%m')) . " diferencia en meses completos";
						if($meses == 0){						
		?>
			<div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
	      <div class="media">
	        <div class="media-body fnt-smaller">
	            <a href="#" target="_parent"></a>
	
	            <h4 class="media-heading">
	              <a href="#" target="_parent"><?php echo $evento->nombre; ?> <small class="pull-right"><?php echo ($intervalo->format('%R') =="-") ? "Faltan " : "Faltan ";  																																													 
																																													echo $intervalo->format('%d'); ?> días</small></a></h4>
	            <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
	                <li><span class="label label-success"><?php echo "Del:" . date('d-m-Y H:i:s', strtotime ($evento->fechaInicio_ft)); ?></span></li>	
	                <li><span class="label label-warning"><?php echo "Al: " .  date('d-m-Y H:i:s', strtotime ($evento->fechaFin_ft)); ?></span></li>
	                <li><span class="label label-info">
	                	<?php 
	              			$fechaInicio = new DateTime($evento->fechaInicio_ft);
	          					$fechaFin = new DateTime($evento->fechaFin_ft);
	          					$duracion = $fechaInicio->diff($fechaFin);
	          					echo 'Dur.: ' . $duracion->format("%d") . " días"; 
	            			?>
	                </span></li>
	            </ul>	
	            <p class="hidden-xs"><?php echo $evento->descripcion; ?></p>
	        </div>
	      </div>
	    </div>
		<?php 	}
					} ?>
	</div>
</div>
<div style="margin-bottom:200px;"></div>
