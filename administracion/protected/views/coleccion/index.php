<div class="row">
	<div class="col-lg-12">
		<?php
			$this->pageCaption='Colecciones';
			$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
			$this->pageDescription='Listar';
			$this->breadcrumbs=array(
				'Colecciones',
			);
			
			$this->menu=array(
				
			);
		?>
	</div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Las colecciones nos ayudan a agrupar los volúmenes y expedientes que se estén publicando.
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
      <table id="myTable" class="display table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Nombre <i class="fa fa-sort"></i></th>
            <th>Tipo de Clasificación <i class="fa fa-sort"></i></th>
            <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>            
          </tr>
        </thead>
        <tbody>
        	<?php foreach($colecciones as $coleccion){ ?>
	        	<tr>
	            <td><?php echo $coleccion->nombre; ?></td>
	            <td><?php echo $coleccion->tipoClasificacion->nombre; ?></td>
	            <td><?php echo ($coleccion->estatus_did == 1) ? '<span class="label label-success">' . $coleccion->estatus->tipo. '</span>' :
	            							'<span class="label label-danger">' . $coleccion->estatus->tipo . '</span>'; ?></td>
	           
	          </tr>
        	<?php } ?>
         </tbody>
      </table>
  </div>
</div>
