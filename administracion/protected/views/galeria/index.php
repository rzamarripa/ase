<?php
$this->pageCaption='Galerías';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar';
$this->breadcrumbs=array(
	'Galerías',
);

$this->menu=array(
	array('label'=>'Crear Galerías','url'=>array('create')),
);
?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Las galerías nos ayudan a mostrar a nuestras instalaciones y eventos.
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
    <div class="table-responsive">
      <table id="myTable" class="display table table-bordered table-hover table-striped">
        <thead>
          <tr>
          	<th>Subir <i class="fa fa-sort"></i></th>
            <th>Nombre <i class="fa fa-sort"></i></th>
            <th class="col-lg-6">Descripción <i class="fa fa-sort"></i></th>
            <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>
            <th class="col-lg-3 col-md-3">Acciones <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach($galerias as $galeria){ ?>
	        	<tr>
	        		<td style="text-align:center"><?php echo CHtml::link('<span class="glyphicon glyphicon-camera"></span>',array('detalleGaleria/subir','id'=>$galeria->id), array('class'=>'btn btn-primary')); ?></td>
	            <td><?php echo $galeria->nombre; ?></td>
	            <td><?php echo $galeria->descripcion; ?></td>
	            <td><?php echo ($galeria->estatus_did == 1) ? '<span class="label label-success">' . $galeria->estatus->tipo. '</span>' :
	            							'<span class="label label-danger">' . $galeria->estatus->tipo . '</span>'; ?></td>
	            <td>
	            	<?php echo CHtml::link('Ver',array('galeria/view','id'=>$galeria->id),array('class'=>'btn btn-info btn-sm')); ?>
		            <?php echo CHtml::link('Editar',array('galeria/update','id'=>$galeria->id),array('class'=>'btn btn-success btn-sm')); ?>
								<?php echo ($galeria->estatus_did == 1) ? 
														CHtml::link('No publicar',array('galeria/cambiar','id'=>$galeria->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
														CHtml::link('Publicar',array('galeria/cambiar','id'=>$galeria->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>
	            </td>
	          </tr>
        	<?php } ?>
         </tbody>
      </table>
    </div>
  </div>
</div>