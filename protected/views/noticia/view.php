<?php
$this->pageCaption='Nota: '.$model->titulo;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';

?>
<div class="row">
	<div class="col-xs-3 col-sm-4 col-md-4 col-lg-3">
		<img src="<?php echo Yii::app()->baseUrl . '/administracion/images/noticias/' . $model->ruta; ?>" width="200" class="img-thumbnail"/>
	</div>
	<div class="col-xs-9 col-sm-8 col-md-8 col-lg-9">
		<h4 class="lead"><?php echo CHtml::decode($model->titulo); ?><small class="text-primary pull-right"><?php echo CHtml::decode(date("d-m-Y H:i:s", strtotime($model->fecha_f))); ?></small></h4>
		<?php echo CHtml::decode($model->mensaje); ?><br/> 
		<blockquote class="blockquote-reverse">
		  <footer>
		  	<cite title="Source Title">
		  		<?php echo CHtml::decode($model->usuario->nombre . " " . 
						$model->usuario->apPaterno . " " . 
						$model->usuario->apMaterno); 
					?>
				</cite>
			</footer>
		</blockquote>
	</div>
</div>