<?php
	$this->pageCaption='';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription='';
	if(!Yii::app()->user->isGuest){
		$this->menu=array(
			array('label'=>'Crear Foro','url'=>array('create')),
		);
	}
?>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<table class="table table-striped table-bordered table-hover">
			<caption><h4>Listado de Foros</h4></caption>
			<thead class="thead">
				<tr>
					<th class="text-center">Autor</th>
					<th class="text-center">Título</th>
					<th class="text-center">Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($foros as $foro){ ?>
				<tr>
					<td><?php echo $foro->autor;?></td>	
					<td><?php echo $foro->titulo;?></td>			
					<td class="text-center"><?php $this->widget('bootstrap.widgets.TbButton', array(
					'url'=>array('foro/view','id'=>$foro->id),
					'label'=>'Ver',
					'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'size'=>'', // null, 'large', 'small' or 'mini'
										)); ?></td>			
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>