<?php
$this->pageCaption='Foro';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar foro';
$this->breadcrumbs=array(
	'Foro',
);

$this->menu=array(
	array('label'=>'Crear Foro','url'=>array('create')),
);
?>

<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Las foros nos ayudan a agrupar temas de interés entre personas.
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
    <table id="myTable" class="display table table-bordered table-hover table-striped">
      <thead>
        <tr>
        	<th>Autor <i class="fa fa-sort"></i></th>
          <th>Títulos <i class="fa fa-sort"></i></th>
          <th class="col-lg-2">Respuestas <i class="fa fa-sort"></i></th>
          <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>            
          <th class="col-lg-3 col-md-3">Acciones <i class="fa fa-sort"></i></th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($foros as $foro){ ?>
        	<tr>
        		<td><?php echo $foro->autor; ?></td>
            <td><?php echo $foro->titulo; ?></td>
            <td><?php echo $foro->respuestas; ?></td>
            <td><?php echo ($foro->estatus_did == 2 || $foro->estatus_did == 3) ? '<span class="label label-danger">No Publicado</span>' :
            							'<span class="label label-success">Publicado</span>'; ?></td>
            <td>
            	<?php echo CHtml::link('Ver',array('foro/view','id'=>$foro->id),array('class'=>'btn btn-info btn-sm')); ?>
	            <?php echo CHtml::link('Editar',array('foro/update','id'=>$foro->id),array('class'=>'btn btn-success btn-sm')); ?>
							<?php echo ($foro->estatus_did == 1) ? 
													CHtml::link('No publicar',array('foro/cambiar','id'=>$foro->id,'estatus'=>3),array('class'=>'btn btn-danger btn-sm')) : 
													CHtml::link('Publicar',array('foro/cambiar','id'=>$foro->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>
            </td>
          </tr>
      	<?php } ?>
       </tbody>
    </table>
  </div>
</div>