<div class="container">
	<div class="row ">
<?php
Yii::app()->clientScript->registerCoreScript('jquery');
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';

$pag_max = ArchivoDetalle::model()->count("archivoId = ". $model->archivoId);
Yii::app()->clientScript->registerScript('ir_validacion',"
    $('#form_pagina').submit(function(e){      
      var pag_max = {$pag_max};
      var pag_ir = $('#form_pagina #ir').val();
      pag_ir = parseInt(pag_ir);
      if( pag_ir > pag_max ){
        alert('Disculpe, la última página que disponemos es la número ' + pag_max);
        e.preventDefault();
      }
    });
    
    $('#form_pagina #ir').keyup(function () { 
     this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    
",CClientScript::POS_READY);
?>


	<div class="col-sm-12 col-md-12 col-lg-12">
	</div>
</div>
<div class="row well">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="row text-center">
			<div class="col-sm-4 col-md-4 col-lg-4">
			  <?php if($model->consecutivo !=1){  ?>
				  <a class="btn btn-primary btn-sm" href="<?php echo CController::createUrl("coleccion/verimagenes", array('id' =>$model->archivoId, "c" => $model->consecutivo - 1) ); ?>" > <span class="glyphicon glyphicon-chevron-left"></span> </a>
				<?php } ?>				
				<?php echo $model->consecutivo . "/" . ArchivoDetalle::model()->count("archivoId = " . $model->archivoId); ?>
				<?php if($model->consecutivo != ArchivoDetalle::model()->count("archivoId = " . $model->archivoId) ){  ?>
				  <a class="btn btn-primary btn-sm" href="<?php echo CController::createUrl("coleccion/verimagenes", array('id' =>$model->archivoId, "c" => $model->consecutivo + 1) ); ?>" > <span class="glyphicon glyphicon-chevron-right"></span> </a>
				<?php } ?>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<form id="form_pagina" class="form-inline" role="form" method="GET" action="<?php echo CController::createUrl("coleccion/verimagenes", array('id' =>$model->archivoId)); ?>">  						
					
						<div class="form-group col-sm-10">
							<input id="ir" class="form-control" type="text" name="c" value=""/>
						</div>
						<div class="col-sm-2">
							<input class="btn btn-primary btn-sm" type="submit" value="Ir"/>
						</div>
					
				</form>
			</div>
		</div>
		<div class="wrapper" style="height:800px;">
			<?php
			/*
				$s = pack('H*', strtolower($model-> {$resolution == "hd" ? "imagenjpeg" : "thumbnail"}));
				// ocera: si se usa mysql usar esta linea
				//$s = $model-> {$resolution == "hd" ? "imagenjpeg" : "thumbnail"};
				//echo '<img id="img_historico" class="img-thumbnail" width="800" heigth="800" alt="" src="data:image/jpeg;base64,'. base64_encode($s) .'" data-zoom-image="data:image/jpeg;base64,'. base64_encode($s) .'" />';

				*/
			?>
			<?php $s = pack('H*', strtolower($model->archivopdf)); ?>
			<!--<iframe src="data:aplication/pdf;base64,<?php // echo base64_encode($s)?>" style="width:718px; height:700px;" frameborder="0"></iframe>-->
			<embed width="100%" height="100%" src="data:application/pdf;base64,<?php echo base64_encode($s)?>" type="application/pdf">
			<?php // echo Yii::app()->baseUrl; ?>
			
			
<div>
		</div>
 </div>
</div>
</div>
<?php 
$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/iviewer/jquery.mousewheel.js');
$cs->registerScriptFile($baseUrl.'/js/iviewer/jqueryui.js');
$cs->registerScriptFile($baseUrl.'/js/iviewer/jquery.iviewer.js'); 
$cs->registerScriptFile($baseUrl.'/js/iviewer/knockouts.js'); 




?>
<script type="text/javascript">
	/*

      $('#img_historico').elevateZoom({
    	zoomType: "inner",
		cursor: "crosshair",
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750,
		scrollZoom: true,
   	});
*/
</script>
<script type="text/javascript">
      var iv1 = $("#viewer").iviewer({
          src: <?php $s = pack('H*', strtolower($model-> {$resolution == "hd" ? "archivopdf" : "archivopdf"}));
       		echo '"data:image/jpeg;base64,'. base64_encode($s) .'"'; ?>,
          update_on_resize: false,
          zoom_animation: false,
          mousewheel: false,
          onMouseMove: function (ev, coords) {},
          onStartDrag: function (ev, coords) {
              return true;
          }, //this image will not be dragged
          onDrag: function (ev, coords) {}
      });

      $("#in").click(function () {
          iv1.iviewer('zoom_by', 1);
      });
      $("#out").click(function () {
          iv1.iviewer('zoom_by', -1);
      });
      $("#fit").click(function () {
          iv1.iviewer('fit');
      });
      $("#orig").click(function () {
          iv1.iviewer('set_zoom', 100);
      });
      $("#update").click(function () {
          iv1.iviewer('update_container_info');
      });
</script>
<pdf> </pdf>