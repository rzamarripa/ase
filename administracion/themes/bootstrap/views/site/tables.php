
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Secciones</h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Inicio</a></li>
              <li class="active"><i class="fa fa-table"></i> Secciones</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Las secciones nos ayudan a agrupa los artículos que se estén publicando, tenga mucho cuidado con los nombres de las secciones.
            </div>
          </div>
        </div><!-- /.row -->

<?php $this->widget('bootstrap.widgets.TbButton', array(
'url'=>array('seccion/create'),
'label'=>'Agregar',
'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
'size'=>'', // null, 'large', 'small' or 'mini'
					)); ?>
        <div class="row">          
          <div class="col-lg-12">
            <h2>Listado</h2>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Nombre <i class="fa fa-sort"></i></th>
                    <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>
                    <th class="col-lg-2">Acciones <i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Sección 1</td>
                    <td>Publicada</td>
                    <td><span class="label label-success">Editar</span> <span class="label label-danger">Eliminar</span></td>
                  </tr>
                  <tr>
                    <td>Sección 2</td>
                    <td>Publicada</td>
                    <td><span class="label label-success">Editar</span> <span class="label label-danger">Eliminar</span></td>
                  </tr>
                  <tr>
                    <td>Sección 3</td>
                    <td>Publicada</td>
                    <td><span class="label label-success">Editar</span> <span class="label label-danger">Eliminar</span></td>
                  </tr>
                  <tr>
                    <td>Sección 4</td>
                    <td>Sin publicar</td>
                    <td><span class="label label-success">Editar</span> <span class="label label-danger">Eliminar</span></td>
                  </tr>
                  <tr>
                    <td>Sección 5</td>
                    <td>Publicada</td>
                    <td><span class="label label-success">Editar</span> <span class="label label-danger">Eliminar</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
