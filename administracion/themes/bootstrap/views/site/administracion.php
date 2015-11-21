<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Tablero</h1>
	</div>	
</div>
<div class="row">
  <div class="col-lg-3">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <i class="fa fa-comments fa-5x"></i>
          </div>
          <div class="col-xs-6 text-right">
            <h1 style="font-size:40pt;"><strong><?php echo Foro::model()->count("estatus_did = 3 and identificador= 0");?></strong></h1>
            <p class="announcement-text">Temas en Foro!</p>
          </div>
        </div>
      </div>
      <?php echo CHtml::link('<div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-6">
              Ver...
            </div>
            <div class="col-xs-6 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>',array('foro/index')); ?>  
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <i class="fa fa-check fa-5x"></i>
          </div>
          <div class="col-xs-6 text-right">
            <h1 style="font-size:40pt;"><strong><?php echo Usuario::model()->count("estatus_did = 1");?></strong></h1>
            <p class="announcement-text">Usuarios Registrado</p>
          </div>
        </div>
      </div>
      <?php echo CHtml::link('<div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-6">
              Ver...
            </div>
            <div class="col-xs-6 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>',array('usuario/index')); ?>        
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <i class="fa fa-tasks fa-5x"></i>
          </div>
          <div class="col-xs-6 text-right">
            <h1 style="font-size:40pt;"><strong><?php echo Encuesta::model()->count("estatus_did = 1");?></strong></h1>
            <p class="announcement-text">Encuestas Totales</p>
          </div>
        </div>
      </div>
      <?php echo CHtml::link('<div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-6">
              Ver...
            </div>
            <div class="col-xs-6 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>',array('encuesta/index')); ?>  
    </div>
  </div>
  <div class="col-lg-3">
    <div class="panel panel-success">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <i class="fa fa-comments fa-5x"></i>
          </div>
          <div class="col-xs-6 text-right">
            <h1 style="font-size:40pt;"><strong><?php echo Coleccion::model()->count("estatus_did = 1");?></strong></h1>
            <p class="announcement-text">Colecciones Totales!</p>
          </div>
        </div>
      </div>
      <?php echo CHtml::link('<div class="panel-footer announcement-bottom">
          <div class="row">
            <div class="col-xs-6">
              Ver...
            </div>
            <div class="col-xs-6 text-right">
              <i class="fa fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>',array('../coleccion/index')); ?>  
    </div>
  </div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12" style="padding-top:50px;">
			<table class="table table-striped table-bordered" id="myTable" >
				<thead class="thead">
					<tr>
						<th>Mensaje</th>
						<th>Usuario</th>
						<th>Fecha y Hora</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($actividades as $actividad){ ?>
					<tr>
						<td><?php echo $actividad->mensaje;?></td>	
						<td><?php echo $actividad->usuario;?></td>			
						<td><?php echo date("d-M-Y H:i:s", strtotime($actividad->fecha_ft));?></td>			
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>