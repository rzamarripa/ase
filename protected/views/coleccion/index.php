<?php
	$this->pageCaption='';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';
?>
<div class="container">
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'busqueda-form',
			'type'=>'inline',
			'enableAjaxValidation'=>false,
		)); ?>
		<div class="form-group">
			<div class="input-group">
		      	<div class="input-group-addon "><i class="fa fa-search"></i></div>
		      		<input name="busqueda" id="busqueda" class='form-control' placeholder='Realice búsquedas por Folio' type="text">					
				</div>				
				<?php 
		       		echo CHtml::ajaxLink('Buscar', 
						 	CController::createUrl('coleccion/buscar'), array(						 		
								'type'=>'POST',			        
								'data'=>array(
									'busqueda'=>'js:$("#busqueda").val()',
								),
								'update'		=> '#imagen',	  
								"class"			=> "btn btn-info",         
								//'beforeSend' 	=> "function() { $('#myModal').modal('show') }",
								//'complete'		=> "function() { $('#myModal').modal('hide') }",
							),array(
					            'onclick'=>'valida(this)',
					    //       'onmouseup'=>'$("#mydialog").dialog("open"); return false;',
					        ));
				?>
			</div>								
		</div>		
		<?php $this->endWidget(); ?>
	</div>
</div>
</div>
<div class="row">
	<div class="col-lg-12" id="imagen" >
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
	</div>
</div>

<script>
	$( document ).ready(function() {
    document.getElementById("exp").style.display="none";
    document.getElementById("botonVolumen").style.display="none";
    document.getElementById("botonExpediente").style.display="none";
	});
	function colecciones(){
		document.getElementById("exp").style.display="none";
		document.getElementById("botonExpediente").style.display="none";
		document.getElementById("botonVolumen").style.display="none";
	}
	function volumenes(id){
		document.getElementById("botonExpediente").style.display="none";
		if($("#volumenes").find('option:selected').attr("data-type")== "si"){
			document.getElementById("exp").style.display="block";
			document.getElementById("botonVolumen").style.display="none";
		}else{
			document.getElementById("exp").style.display="none";
			$("#botonVolumen").html('<a target="_blank" class="btn btn-warning" style="margin-top:20px;" href="/index.php/coleccion/verimagenes/' + id + '?t=v">Ver Volumen</a>');
			document.getElementById("botonVolumen").style.display="block";
		}
		
	}
	function expedientes(){
		if($("#expedientes").find('option:selected').text() != ""){
			document.getElementById("botonExpediente").style.display="block";
		}
	}

	function valida(control) {
		//console.log("entre al evento " + document.getElementById("busqueda").value);
        if(document.getElementById("busqueda").value.trim() == ""){
        	var busqueda = $("#busqueda").val();
        	if(busqueda.length == 0 && busqueda.trim() == 0){
        		alert("Está en blanco el criterio")
        		$("#busqueda-form").submit(function(e){
				    return false;
				});
        	}
        	
        }else{
        	//$('#myModal').modal('show');
        	return true;
        }
        
    }
</script>