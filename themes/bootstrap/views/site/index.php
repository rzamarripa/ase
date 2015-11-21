<?php $c=0; ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div id="carousel-example-captions" class="carousel slide" data-ride="carousel" style="height:300px;">
		  <ol class="carousel-indicators">
		  	<?php $c=0; foreach($carruseles as $carrusel){  ?>
		    <li data-target="#carousel-example-captions" data-slide-to="<?php echo $c; ?>" class="<?php echo ($c == 0) ? 'active' : ''; ?>"></li>
		    <?php $c++; } ?>

		  </ol>
		  <div class="carousel-inner">
		  	<?php $c=0; foreach($carruseles as $carrusel){ $c++; ?>
					<div class="item <?php echo ($c == 1) ? 'active' : ''; ?>">
			      <img src="<?php echo Yii::app()->baseUrl . '/administracion/images/carrusel/' . $carrusel->ruta; ?>">
			      <div class="carousel-caption">
			        <h3><?php echo $carrusel->nombre; ?></h3>
			        <p><?php echo $carrusel->descripcion; ?></p>
			      </div>
			    </div>
		  	<?php } ?>
		  </div>
		  <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		  </a>
		</div>
	</div>
</div>
<br>
<div class="row noticia"><br/>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<?php foreach($noticias as $noticia){ ?>
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
					<img src="<?php echo Yii::app()->baseUrl . '/administracion/images/noticias/' . $noticia->ruta; ?>" width="200" class="img-thumbnail"/>
				</div>
				<div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
					<h4 class="lead"><?php echo CHtml::decode($noticia->titulo); ?><small class="text-primary pull-right"><?php echo CHtml::decode(date("d-m-Y H:i:s", strtotime($noticia->fecha_f))); ?></small></h4>
					<?php echo substr(CHtml::decode($noticia->mensaje), 0, 500);
								if (count_chars($noticia->mensaje) >= 500){ ?>
									<span>...</span>
									<a class="btn btn-warning btn-sm" href="<?php echo CController::createUrl("noticia/view", array('id' =>$noticia->id)); ?> " > <span class="glyphicon glyphicon-eye-open"></span> Leer Más</a>
									<br/>
								<?php } ?>
				</div>
			</div>
			<hr>
		<?php } ?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ladoder">
		<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FArchivo-Hist%25C3%25B3rico-de-Monterrey%2F520838024727939&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
		<?php echo CHtml::link("<div id='smallcalendar'></div><hr size='30'>",array('evento/index')); ?>
		<div style='margin-top:30px;'>
		<?php foreach($encuestas as $encuesta){
						$respuestas = OpcionesEncuesta::model()->findAll("estatus_did = 1 and encuesta_did = " . $encuesta->id);
						if(count($respuestas) > 0){
							$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
							'id'=>$encuesta->id));
							echo "<h3>" . $encuesta->nombre . "</h3>";
							$respuestasArray = array();
							$c = 0;
							foreach($respuestas as $respuesta){
								$respuestasArray[$c] = $respuesta->nombre;
								echo '<p>' . $form->radioButton($respuesta, 'id', array(
								    'value'=>$respuesta->id,
								    'uncheckValue'=>null
								));
								echo $respuesta->nombre . '</p>';

								$c++;
							}
							echo $form->hiddenField($encuesta, "nombre");
							echo $form->hiddenField($encuesta, "id");

							echo '<br/><div>';
							$this->widget('bootstrap.widgets.TbButton', array(
								'buttonType'=>'submit',
								'type'=>'warning',
								'label'=>'Votar',
								'block'=>true,
							));
							echo  '</div><hr>';
							$this->endWidget();
							echo '<br/>';
						}

		 } ?>
		</div>
	</div>
</div>
