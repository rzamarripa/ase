<?php
$this->pageCaption='Publicaciones';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Recientes';
if(!Yii::app()->user->isGuest){
	$this->menu=array(
		array('label'=>'Crear Publicación','url'=>array('create','tipo'=>'pub')),
	);
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php foreach($publicaciones as $publicacion){ ?>
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">					
					<img src="<?php echo Yii::app()->baseUrl . '/administracion/images/noticias/' . $publicacion->ruta; ?>" width="200" class="img-thumbnail"/>
				</div>
				<div class="col-xs-6 col-sm-8 col-md-8 col-lg-9">
					<h4 class="lead"><?php echo CHtml::decode($publicacion->titulo); ?><small class="text-primary pull-right"><?php echo CHtml::decode(date("d-m-Y H:i:s", strtotime($publicacion->fecha_f))); ?></small></h4>
					<?php echo substr(CHtml::decode($publicacion->mensaje), 0, 750); 
								if (strlen($publicacion->mensaje) >= 750){ 
									echo "<br/>";									
									echo CHtml::link('Leer más',array('noticia/view','id'=>$publicacion->id),array("class"=>"btn btn-warning text-right"));
									echo "<br/>";
								} ?>
					<p class="text-right"><?php echo '<strong>Autor: </strong>' . CHtml::decode($publicacion->usuario->nombre . " " . $publicacion->usuario->apPaterno . " " . $publicacion->usuario->apMaterno); ?></p>
				</div>
			</div>
			<hr>
		<?php } ?>
	</div>	
</div>
