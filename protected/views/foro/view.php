<?php
	$this->pageCaption='Foro: '.$model->titulo;
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';
	$respuestas = Foro::model()->findAll("estatus_did = 1 and identificador = " . $model->id);
	$c = 0;
	
?>

<div class="row">
	<div class="col-sm-12 col-md-8 col-lg-8">
		<span class="timeline-seperator text-center"><?php echo date("d-m-Y H:i:s", strtotime($model->fecha_f));?></span>
		<small class="text-muted pull-right ultra-light"> 
			<?php 
				$fechaActual = new DateTime(date("Y-m-d H:i:s")); 
				$fechaMensaje = new DateTime(date('Y-m-d H:i:s', strtotime ($model->fecha_f)));													
				$intervalo = $fechaActual->diff($fechaMensaje); 
				echo $intervalo->format('%d días y %H:%i:%s'); 
			?> atrás
		</small>
		<div class="chat-body no-padding profile-message">
			<ul>
				<li class="message animated bounceInLeft">
					<img src="<?php echo ($model->usuario->foto != '') ? 
																Yii::app()->baseUrl . '/administracion/fotos/' . $model->usuario->foto : 
																Yii::app()->baseUrl . '/administracion/themes/bootstrap/img/avatars/male.png';?>" class="online" width="50">
					<span class="message-text"><strong><?php echo $model->autor; ?></strong> <br/>					
						<h4><?php echo $model->titulo; ?></h4>						 
						<?php echo $model->mensaje; ?>
					</span>
					<p class="text-right">
						<?php if(!Yii::app()->user->isGuest){ 
							echo '<span>' . CHtml::link('<i class="fa fa-reply"></i> Responder',array('foro/create','id'=>$model->id, 'foro'=>$_GET["id"]),array("class"=>"text-success")) . '</span>'; 
						} ?>
					</p>
				</li>

				<?php
					$margen = 30;
					foreach($respuestas as $respuesta){
						
						Respuesta($respuesta->id, $respuesta->titulo, $margen);
					}
					
					function Respuesta($id, $titulo, $margen){  $respuesta = Foro::model()->find("id = " . $id); ?>
						<li class="message message-reply animated bounceInRight" style="padding-left:<?php echo $margen; ?>px">					
							<img style="width:40px;" src="<?php echo ($respuesta->usuario->foto != "") ? 
																		Yii::app()->baseUrl . '/administracion/fotos/' . $respuesta->usuario->foto : 
																		Yii::app()->baseUrl . '/administracion/themes/bootstrap/img/avatars/male.png';?>" class="online">
							<span class="message-text"><strong><?php echo $respuesta->autor;?></strong> <br/>
								<h4><?php echo $respuesta->titulo; ?></h4>
								<?php echo $respuesta->mensaje; ?> 						
							</span>
							<br/>
								<?php if(!Yii::app()->user->isGuest){ ?>
									<ul class="list-inline font-xs text-right">
										<li>
											<?php echo CHtml::link('<i class="fa fa-reply"></i> Responder',array('foro/create','id'=>$id, 'foro'=>$_GET["id"]),array("class"=>"text-success")); ?>
										</li>
									</ul>
								<?php } ?>
							<?php $masrespuestas = Foro::model()->findAll("estatus_did = 1 and identificador = " . $id);	
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
	<div class="col-sm-12 col-md-4 col-lg-4 pull-right">		
		<?php 
			foreach($foros as $foro){ $c++;
			 $this->widget('bootstrap.widgets.TbButton', array(
				'url'=>array('foro/view','id'=>$foro->id),
				'label'=>$c . ".- " . $foro->titulo,
				'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'size'=>'', // null, 'large', 'small' or 'mini'
			)); ?><br/>
		<?php } ?>
	</div>
</div>