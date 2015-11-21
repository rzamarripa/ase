<?php
$this->pageCaption='Noticias';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar noticias';
$this->breadcrumbs=array(
	'Noticias',
);

$this->menu=array(
	array('label'=>'Crear Noticia','url'=>array('create','tipo'=>$_GET["tipo"])),
);
?>

<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Las noticias sirven para publicar alguna nota importante en alguna sección que usted seleccione.
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
      <table id="myTable" class="display table table-bordered table-hover table-striped">
        <thead>
          <tr>
          	<th>Autor <i class="fa fa-sort"></i></th>
            <th>Título <i class="fa fa-sort"></i></th>
            <th class="col-lg-2">Fecha <i class="fa fa-sort"></i></th>            
            <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>
            <th class="col-lg-3 col-md-3">Acciones <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach($noticias as $noticia){ ?>
	        	<tr>
	        		<td><?php echo $noticia->usuario->nombre; ?></td>
	            <td><?php echo $noticia->titulo; ?></td>
	            <td><?php echo date("d-m-Y H:i:s", strtotime ($noticia->fecha_f)); ?></td>
	            <td class="text-center"><?php echo ($noticia->estatus_did == 2) ? '<span class="label label-danger">' . $noticia->estatus->tipo. '</span>' :
	            							'<span class="label label-success">' . $noticia->estatus->tipo . '</span>'; ?></td>
	            <td>
	            	<?php echo CHtml::link('Ver',array('noticia/view','id'=>$noticia->id, 'tipo'=>$_GET["tipo"]),array('class'=>'btn btn-info btn-sm')); ?>
		            <?php echo CHtml::link('Editar',array('noticia/update','id'=>$noticia->id, 'tipo'=>$_GET["tipo"]),array('class'=>'btn btn-success btn-sm')); ?>
								<?php echo ($noticia->estatus_did == 1) ? 
														CHtml::link('No publicar',array('noticia/cambiar','id'=>$noticia->id,'estatus'=>2, 'tipo'=>$_GET["tipo"]),array('class'=>'btn btn-danger btn-sm')) : 
														CHtml::link('Publicar',array('noticia/cambiar','id'=>$noticia->id,'estatus'=>1, 'tipo'=>$_GET["tipo"]),array('class'=>'btn btn-primary btn-sm')); ?>
	            </td>
	          </tr>
        	<?php } ?>
         </tbody>
      </table>
  </div>
</div>