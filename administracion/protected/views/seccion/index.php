<div class="row">
	<div class="col-lg-12">
		<?php
			$this->pageCaption='Secciones';
			$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
			$this->pageDescription='Listar';
			$this->breadcrumbs=array(
				'Sección',
			);
			
			$this->menu=array(
				array('label'=>'Crear Sección','url'=>array('create')),
			);
		?>
	</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Las secciones nos ayudan a agrupar los artículos que se estén publicando, tenga mucho cuidado con los nombres de las secciones.
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
      <table id="myTable" class="display table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Nombre <i class="fa fa-sort"></i></th>
            <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>
            <th class="col-lg-3 col-md-3">Acciones <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach($secciones as $seccion){ ?>
	        	<tr>
	            <td><?php echo $seccion->nombre; ?></td>
	            <td><?php echo ($seccion->estatus_did == 1) ? '<span class="label label-success">' . $seccion->estatus->tipo. '</span>' :
	            							'<span class="label label-danger">' . $seccion->estatus->tipo . '</span>'; ?></td>
	            <td>
	            	<?php echo CHtml::link('Ver',array('seccion/view','id'=>$seccion->id),array('class'=>'btn btn-info btn-sm')); ?>
		            <?php echo CHtml::link('Editar',array('seccion/update','id'=>$seccion->id),array('class'=>'btn btn-success btn-sm')); ?>
								<?php echo ($seccion->estatus_did == 1) ? 
														CHtml::link('No publicar',array('seccion/cambiar','id'=>$seccion->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
														CHtml::link('Publicar',array('seccion/cambiar','id'=>$seccion->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>
	            </td>
	          </tr>
        	<?php } ?>
         </tbody>
      </table>
  </div>
</div>
