<?php
$this->pageCaption=($_GET["tipo"] == "not") ? 'Ver Noticia #'.$model->id : 'Ver Publicación #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';

if($_GET["tipo"] == "not"){
	$this->breadcrumbs=array(
		'Noticia',
		$model->id,
	);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index','tipo'=>'not')),
		array('label'=>'Editar','url'=>array('update','id'=>$model->id,'tipo'=>'not')),
	);	
} else if($_GET["tipo"] == "pub"){
	$this->breadcrumbs=array(
		'Publicación',
		$model->id,
	);
	$this->menu=array(
		array('label'=>'Volver','url'=>array('index','tipo'=>'pub')),
		array('label'=>'Editar','url'=>array('update','id'=>$model->id,'tipo'=>'pub')),
	);
}

?>
<div class="col-md-12 col-lg-12 blogShort">
   <h1><?php echo $model->titulo; ?></h1>
   <img class="img-thumbnail" src="<?php echo Yii::app()->baseUrl . '/images/noticias/' . $model->ruta; ?>" />
   <article><p>
       <?php echo CHtml::decode($model->mensaje); ?>
       </p>
   </article>
   <span class="label lable-info pull-right"><?php $model->usuario->nombre; ?></span>
</div>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<?php 
			echo ($model->estatus_did == 1) ? 
			CHtml::link('No publicar',array('noticia/cambiar','id'=>$model->id,'estatus'=>2, 'tipo'=>$_GET["tipo"]),array('class'=>'btn btn-danger btn-sm')) : 
			CHtml::link('Publicar',array('noticia/cambiar','id'=>$model->id,'estatus'=>1, 'tipo'=>$_GET["tipo"]),array('class'=>'btn btn-primary btn-sm')); 
		?>		
	</div>
</div>
