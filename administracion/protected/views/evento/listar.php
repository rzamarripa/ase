<?php
$this->pageCaption='Eventos';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar eventos';
$this->breadcrumbs=array(
	'Eventos',
);

$this->menu=array(
	array('label'=>'Ver el Calendario','url'=>array('index')),
);
?>

<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Los eventos se publican con la intención de mostrar al público en general las actividades.
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
    <table id="myTable" class="display table table-bordered table-hover table-striped">
      <thead>
        <tr>
        	<th>Nombre <i class="fa fa-sort"></i></th>
          <th>Descripción <i class="fa fa-sort"></i></th>
          <th class="col-lg-2">Fecha Inicio <i class="fa fa-sort"></i></th>
          <th class="col-lg-2">Fecha Final <i class="fa fa-sort"></i></th>
          <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>            
          <th class="col-lg-3 col-md-3">Acciones <i class="fa fa-sort"></i></th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach($eventos as $evento){ ?>
        	<tr>
        		<td><?php echo $evento->nombre; ?></td>
            <td><?php echo $evento->descripcion; ?></td>
            <td><?php echo $evento->fechaInicio_ft; ?></td>
            <td><?php echo $evento->fechaFin_ft; ?></td>
            <td class="text-center"><?php echo ($evento->estatus_did == 2) ? '<span class="label label-danger">' . $evento->estatus->nombre. '</span>' :
            							'<span class="label label-success">' . $evento->estatus->nombre . '</span>'; ?></td>
            <td>
            	<?php echo CHtml::link('Ver',array('evento/view','id'=>$evento->id),array('class'=>'btn btn-info btn-sm')); ?>
	            <?php echo CHtml::link('Editar',array('evento/update','id'=>$evento->id),array('class'=>'btn btn-success btn-sm')); ?>
							<?php if ($evento->estatus_did == 1){
											echo CHtml::link('No publicar',array('evento/cambiar','id'=>$evento->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm'));
											echo CHtml::link('<i class="fa fa-bell"></i> Notificar',array('evento/notificar','id'=>$evento->id),array('class'=>'btn btn-warning btn-sm'));
										} 
										else 
										{
											echo CHtml::link('Publicar',array('evento/cambiar','id'=>$evento->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm'));
										}
							?>
            </td>
          </tr>
      	<?php } ?>
       </tbody>
    </table>
  </div>
</div>