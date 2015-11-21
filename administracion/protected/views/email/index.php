<?php
$this->pageCaption='Email';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar email';
$this->breadcrumbs=array(
	'Emailing',
);

$this->menu=array(
	array('label'=>'Mandar Emails Masivos','url'=>array('enviar')),
	array('label'=>'Agregar Destinatario','url'=>array('create')),
);
?>

<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Módulo para enviar Emails masivo, para eso se le solicitar inscribirse al usuario en el Front-End en el pié de página.
    </div>
  </div>
</div><!-- /.row -->
<div class="row" style="padding-top:50px;">          
  <div class="col-lg-12">
      <table id="myTable" class="display table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Nombre <i class="fa fa-sort"></i></th>
            <th>Correo <i class="fa fa-sort"></i></th>
            <th class="col-lg-2">Estatus <i class="fa fa-sort"></i></th>
            <th class="col-lg-3 col-md-3">Acciones <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach($emails as $email){ ?>
	        	<tr>
	            <td><?php echo $email->nombre; ?></td>
	            <td><?php echo $email->correo; ?></td>
	            <td><?php echo ($email->estatus_did == 2) ? '<span class="label label-danger">' . $email->estatus->nombre. '</span>' :
	            							'<span class="label label-success">' . $email->estatus->nombre . '</span>'; ?></td>
	            <td>
	            	<?php echo CHtml::link('Ver',array('email/view','id'=>$email->id),array('class'=>'btn btn-info btn-sm')); ?>
		            <?php echo CHtml::link('Editar',array('email/update','id'=>$email->id),array('class'=>'btn btn-success btn-sm')); ?>
								<?php echo ($email->estatus_did == 1) ? 
														CHtml::link('No publicar',array('email/cambiar','id'=>$email->id,'estatus'=>2),array('class'=>'btn btn-danger btn-sm')) : 
														CHtml::link('Publicar',array('email/cambiar','id'=>$email->id,'estatus'=>1),array('class'=>'btn btn-primary btn-sm')); ?>
	            </td>
	          </tr>
        	<?php } ?>
         </tbody>
      </table>
  </div>
</div>