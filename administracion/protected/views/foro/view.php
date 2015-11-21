<?php

	$this->pageCaption='Foro: '.$model->titulo;
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';
	$respuestas = Foro::model()->findAll("identificador = " . $model->id);
	$c = 0;


	$this->menu=array(
		array('label'=>'Volver','url'=>array('index')),
	);

?>

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<span class="timeline-seperator text-center"><?php echo date("d-m-Y H:i:s", strtotime($model->fecha_f));?></span>
		<small class="text-muted pull-right ultra-light"> 
			<?php 
				$fechaActual = new DateTime(date("Y-m-d H:i:s")); 
				$fechaMensaje = new DateTime(date('Y-m-d H:i:s', strtotime ($model->fecha_f)));													
				$intervalo = $fechaActual->diff($fechaMensaje); 
				//echo $intervalo->format('%d días y %H:%i:%s') . " atrás"; 
			?> 
		</small>
		<div class="chat-body no-padding profile-message" >
			<ul>
				<li class="message animated bounceInLeft">
					<img src="<?php echo ($model->usuario->foto != '') ? 
																Yii::app()->baseUrl . '/fotos/' . $model->usuario->foto : 
																Yii::app()->baseUrl . '/themes/bootstrap/img/avatars/male.png';?>" class="online" width="50">
					<span class="message-text"><strong><?php echo $model->autor; ?></strong> <br/>					
						<h4><?php echo $model->titulo; ?></h4>						 
						<?php echo $model->mensaje; ?>
					</span>					
					<ul class="list-inline font-xs">
						<li>
							<?php echo CHtml::link('<i class="fa fa-reply"></i> Responder',array('foro/create','id'=>$model->id),array("class"=>"text-success")); ?>
						</li>	
						<li>
							<?php echo CHtml::link('<i class="fa fa-edit"></i> Editar',array('foro/update','id'=>$model->id),array("class"=>"text-warning")); ?>
						</li>							
						<?php if($model->estatus_did == 2){ ?>
							<li>
								<?php echo CHtml::link('<i class="fa fa-thumbs-o-up"></i> Publicar',array('foro/cambiarvisibilidad','id'=>$model->id, 'estatus'=>1),array("class"=>"text-warning")); ?>							
							</li>	
							<li>
								<?php echo CHtml::link('<i class="fa fa-thumbs-o-down"></i> Rechazar',array('foro/cambiarvisibilidad','id'=>$model->id, 'estatus'=>3),array("class"=>"text-warning")); ?>							
							</li>								
						<?php } else if($model->estatus_did == 3){ ?>
							<li>
								<?php echo CHtml::link('<i class="fa fa-thumbs-o-up"></i> Publicar',array('foro/cambiarvisibilidad','id'=>$model->id, 'estatus'=>1),array("class"=>"text-warning")); ?>							
							</li>	
						<?php } else if($model->estatus_did == 1){ ?>
							<li>
								<?php echo CHtml::link('<i class="fa fa-thumbs-o-down"></i> Rechazar',array('foro/cambiarvisibilidad','id'=>$model->id, 'estatus'=>3),array("class"=>"text-warning")); ?>	
							</li>								
						<?php } ?>
							<li class="pull-right">
								<?php echo ($model->estatus_did == 1) ? '<span class="label label-success">Publicado</span>' :
	            							'<span class="label label-danger">No Publicado</span>'; ?>
							</li>							
					</ul>
				</li>

				<?php
					$margen = 30;
					foreach($respuestas as $respuesta){						
						Respuesta($respuesta->id, $respuesta->titulo, $margen);
					}
					
					function Respuesta($id, $titulo, $margen){  
						$respuesta = Foro::model()->find("id = " . $id); ?>
						<li class="message message-reply animated bounceInRight" style="padding-left:<?php echo $margen; ?>px">					
							<img style="width:40px;" src="<?php echo ($respuesta->usuario->foto != "") ? 
																		Yii::app()->baseUrl . '/fotos/' . $respuesta->usuario->foto : 
																		Yii::app()->baseUrl . '/themes/bootstrap/img/avatars/male.png';?>" class="online">
							<span class="message-text"><strong><?php echo $respuesta->autor;?></strong> <br/>
								<h4><?php echo $respuesta->titulo; ?></h4>
								<?php echo $respuesta->mensaje; ?> 						
							</span>
							<br/>
								<?php if(!Yii::app()->user->isGuest){ ?>
									<ul class="list-inline font-xs">
										<li>
											<?php echo CHtml::link('<i class="fa fa-edit"></i> Editar',array('foro/update','id'=>$respuesta->id),array("class"=>"text-warning")); ?>
										</li>											
										<?php if($respuesta->estatus_did == 2){ ?>
											<li>
												<?php echo CHtml::link('<i class="fa fa-thumbs-o-up"></i> Publicar',array('foro/cambiarvisibilidad','id'=>$respuesta->id, 'estatus'=>1, 'foro'=>$_GET["id"]),array("class"=>"text-warning")); ?>							
											</li>	
											<li>
												<?php echo CHtml::link('<i class="fa fa-thumbs-o-down"></i> Rechazar',array('foro/cambiarvisibilidad','id'=>$respuesta->id, 'estatus'=>3, 'foro'=>$_GET["id"]),array("class"=>"text-warning")); ?>							
											</li>								
										<?php } else if($respuesta->estatus_did == 3){ ?>
											<li>
												<?php echo CHtml::link('<i class="fa fa-thumbs-o-up"></i> Publicar',array('foro/cambiarvisibilidad','id'=>$respuesta->id, 'estatus'=>1, 'foro'=>$_GET["id"]),array("class"=>"text-warning")); ?>							
											</li>	
										<?php } else if($respuesta->estatus_did == 1){ ?>
											<li>
												<?php echo CHtml::link('<i class="fa fa-thumbs-o-down"></i> Rechazar',array('foro/cambiarvisibilidad','id'=>$respuesta->id, 'estatus'=>3, 'foro'=>$_GET["id"]),array("class"=>"text-warning")); ?>	
											</li>								
										<?php } ?>
											<li class="pull-right">
												<?php echo ($respuesta->estatus_did == 1) ? '<span class="label label-success">Publicado</span>' :
					            							'<span class="label label-danger">No Publicado</span>'; ?>
											</li>
									</ul>
								<?php } ?>
							<?php $masrespuestas = Foro::model()->findAll("identificador = " . $id);									
								if(count($masrespuestas) > 0){
									$margen = $margen + 30;
									foreach($masrespuestas as $masrespuesta){											
										Respuesta($masrespuesta->id, $masrespuesta->titulo, $margen);
									}
								} else{
									$margen -= 30;
								}
							?>
						</li>
					<?php } ?>
			</ul>
		</div>		
	</div>	
</div>