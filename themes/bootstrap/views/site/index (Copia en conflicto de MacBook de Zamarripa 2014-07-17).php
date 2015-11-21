<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div id="carousel-example-captions" class="carousel slide" data-ride="carousel" style="height:300px;">
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
		    <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
		    <li data-target="#carousel-example-captions" data-slide-to="3" class=""></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="<?php echo Yii::app()->baseUrl . '/../backend/images/carrusel/img-1.jpg'; ?>">
		      <div class="carousel-caption">
		        <h3>Archivo Histórico 1960</h3>
		        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
		      </div>
		    </div>
		    <div class="item">
		      <img src="<?php echo Yii::app()->baseUrl . '/../backend/images/carrusel/img-2.jpg'; ?>" alt="900x500">
		      <div class="carousel-caption">
		        <h3>Archivo Histórico 1970</h3>
		        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>		        
		      </div>
		    </div>
		    <div class="item">
		      <img src="<?php echo Yii::app()->baseUrl . '/../backend/images/carrusel/img-3.jpg'; ?>">
		      <div class="carousel-caption">
		        <h3>Archivo Histórico 1950</h3>
		        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
		      </div>
		    </div>
		    <div class="item">
		      <img src="<?php echo Yii::app()->baseUrl . '/../backend/images/carrusel/img-4.jpg'; ?>">
		      <div class="carousel-caption">
		        <h3>Archivo Histórico 1980</h3>
		        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
		      </div>
		    </div>
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
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<?php foreach($noticias as $noticia){ ?>
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">					
					<img src="<?php echo Yii::app()->baseUrl . '/../backend/images/noticias/' . $noticia->ruta; ?>" width="200" class="img-thumbnail"/>
				</div>
				<div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
					<h4 class="lead"><?php echo CHtml::decode($noticia->titulo); ?><small class="text-primary pull-right"><?php echo CHtml::decode($noticia->fecha_f); ?></small></h4>
					<?php echo substr(CHtml::decode($noticia->mensaje), 0, 500); ?><br/> 
					<?php echo CHtml::link('Leer más',array('noticia/view','id'=>$noticia->id)); ?>
				</div>
			</div>
			<hr>
		<?php } ?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<?php echo CHtml::link("<div id='smallcalendar' class='well'></div>",array('evento/index')); ?>
		<div class="well" style='margin-top:30px; text-align:center;'>
		<?php foreach($encuestas as $encuesta){ 
						$respuestas = OpcionesEncuesta::model()->findAll("estatus_did = 1 and encuesta_did = " . $encuesta->id);
						if(count($respuestas) > 0){
							echo "<h3>" . $encuesta->nombre . "</h3>"; 
							$respuestasArray = array();
							$c = 0;
							foreach($respuestas as $respuesta){
								$respuestasArray[$c] = $respuesta->nombre; 
								$c++;
							}		
							echo CHtml::hiddenField($encuesta->id, $encuesta->nombre);
							echo CHtml::radioButtonList('choice',"selec",$respuestasArray, array( 'separator' => "  ")); 
						}
						echo '<div class="col-lg-2 col-lg-offset-2">';
						$this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'submit',
							'type'=>'primary',
							'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
						));
						echo  '</div>';
		 } ?>
		</div>
	</div>
</div>
