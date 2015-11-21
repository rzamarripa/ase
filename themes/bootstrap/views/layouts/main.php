<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivo Histórico de Monterrey</title>
	<link href="<?php echo Yii::app()->theme->baseUrl . '/css/datatablejs.css';?>" media="screen" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/smartadmin-production.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
		<!-- Gallery -->    
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fancybox.css" media="screen" rel="stylesheet" >
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.qtip.min.css" media="screen" rel="stylesheet" >
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/iviewer/jquery.iviewer.css" />
    <link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.ico" />
    <!-- Summernote -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/summernote.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/select2bootstrap.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/select2.css';?>" media="screen" rel="stylesheet" type="text/css">
		<!-- Full Calendar -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/fullcalendar.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/smallfullcalendar.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/fullcalendar.print.css';?>" media="print" rel="stylesheet" type="text/css">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome/css/font-awesome.min.css">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/modern.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/zama.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/morris.css" rel="stylesheet">
    
	
    <!-- Page Specific CSS -->
    <!-- <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css"> -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jsapi.js"></script>
    
  </head>
  <body>
  	<div class="container">
  		<div class="row">  			
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
					<?php echo CHtml::link('<img src="' . Yii::app()->theme->baseUrl . '/img/logo.png" alt="logo" style="width:200px; heigth:200px;">',array('site/index')); ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-lg-offset-7" style="text-align:right;">
					<img src="<?php echo Yii::app()->theme->baseUrl . '/img/monterrey.png'; ?>" alt="..." class="pull-right" style="heigth:200px;"><hr><br/>
					<?php if(Yii::app()->user->isGuest){ ?>
					<strong><?php echo CHtml::link('Iniciar Sesión',array('site/login')) . " | " . CHtml::link('Regístrate',array('usuario/create'),array("class"=>"text-warning"));?></strong><br/>
					<?php } else { 
						$usuarioActual = Usuario::model()->obtenerUsuarioActual();
					?>
	        <p class="text-right"><strong><?php echo CHtml::link($usuarioActual->nombre . " " . $usuarioActual->apPaterno, array("usuario/view",'id'=>$usuarioActual->id)); ?></strong> 
	        	<span class="text-left small"><?php echo CHtml::link('Cerrar Sesión',array('site/logout')); ?></span>
	        </p>  
					<?php } ?>				
				</div>
			</div>
			<hr>
	  	 <!-- MAIN PANEL -->
	    <div id="main" class="row">    
	    	<nav class="navbar navbar-default" role="navigation">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		        </div>		        
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse navbar-ex1-collapse">
		          <ul class="nav navbar-nav">
		          	<?php 
						echo "<li>" . CHtml::link('Acervo documental','coleccion/index') . "</li>";
					?>
		          </ul>
		        </div>
		          <!-- /.navbar-collapse -->
		      </div>
		        <!-- /.container -->
		    </nav> 
	        <!-- RIBBON -->
		    <div id="ribbon">
		        <span class="ribbon-button-alignment btn btn-ribbon" data-html="true" data-original-title="message..." data-placement="bottom" data-title="refresh" id="refresh"></span> 
		        <!-- breadcrumb -->
	         <?php if(isset($this->breadcrumbs)):
							$this->widget('BBreadcrumbs', array(
								'links'=>$this->breadcrumbs,
								'separator'=>'  ',
							)); 
						endif ?>
		        <!-- end breadcrumb -->
		 
		    </div><!-- END RIBBON -->
		    <div id="content"> 		    	
		    	<?php echo $content; ?> 
		    </div><!-- END MAIN CONTENT -->	
			 <div class="row text-center padding-top:300px;">
				<div class="col-lg-12">
					<img src="<?php echo Yii::app()->theme->baseUrl . '/img/pie.png'; ?>" style="height:50px; width:100%"/><br/>
					Archivo Histórico de Monterrey ubicado en Museo Metropolitano de Monterrey.<br/>
					Zaragoza y Corregidora, Centro de Monterrey, Nuevo León.
				</div>
			</div>
    	</div> 
    	 
	</div>	
    <script src="<?php echo Yii::app()->theme->baseUrl . '/js/jquery-1.10.2.js';?>"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl . '/js/fullcalendar.min.js';?>"></script>    
    <!-- CUSTOM NOTIFICATION -->
	<script src="<?php echo Yii::app()->theme->baseUrl . '/js/notification/SmartNotification.js';?>"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl . '/js/notificaciones.js';?>"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl . '/js/jquery.qtip.min.js';?>"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		
			    $(".fancybox").fancybox({
			        openEffect: "none",
			        closeEffect: "none",			        
			    });
			    $('#summernote').summernote({
					  height: 150,
				  });
			});
			
			  
    	var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
		  var calendar = $('#calendar').fullCalendar({
		  	height: 700,
			  header: {
		      left: 'prev, next today',
		      center: 'title',
		      right: 'month, basicWeek, basicDay'
		    },
				events: "<?php echo Yii::app()->createUrl('evento/geteventos'); ?>",
				selectable: true,
				selectHelper: true,
				editable: false,
				eventRender: function(event, element) {
          element.qtip({
            content: {
            	text:event.tip
            },
            style: {
							classes: 'qtip-blue'
				    },
				    position: {
				        at: 'center'
				    }
        	});
        }
				
		  });
		  
		  var smallcalendar = $('#smallcalendar').fullCalendar({
		  	height: 300,		  	
				events: "<?php echo Yii::app()->createUrl('evento/geteventos'); ?>",
				selectable: false,
				selectHelper: false,
				editable: false,
				eventRender: function(event, element) {
          element.qtip({
            content: {
            	text:event.tip
            },
            style: {
							classes: 'qtip-blue'
				    },
				    position: {
				        at: 'center'
				    }
        	});
        }
		  });
		  <?php 
			foreach(Yii::app()->user->getFlashes() as $key => $message) { 
				$key = explode("-", $key);
				$key = $key[0];
				if($key == "danger"){ 
					Yii::app()->clientScript->registerScript(
					   'danger',
					   '$.smallBox({
								title : "Ups",
								content : "' . $message . '",
								color : "#a90329",
								iconSmall : "fa fa-thumbs-down bounce animated",
								timeout : 4000
							})',
					   CClientScript::POS_READY
					);
				} else if($key == "info"){ 
					Yii::app()->clientScript->registerScript(
					   'info',
					   '$.smallBox({
								title : "Información",
								content : "' . $message . '",
								color : "#57889c",
								iconSmall : "fa fa-thumbs-up bounce animated",
								timeout : 4000
							})',
					   CClientScript::POS_READY
					);
				} else if($key == "success"){ 
					Yii::app()->clientScript->registerScript(
					   'success',
					   '$.smallBox({
								title : "Modificación",
								content : "' . $message . '",
								color : "#739E73",
								iconSmall : "fa fa-thumbs-up bounce animated",
								timeout : 4000
							})',
					   CClientScript::POS_READY
					);
				} else if($key == "warning"){ 
					Yii::app()->clientScript->registerScript(
					   'warning',
					   '$.smallBox({
								title : "Ojo",
								content : "' . $message . '",
								color : "#c79121",
								iconSmall : "fa fa-thumbs-down bounce animated",
								timeout : 4000
							})',
					   CClientScript::POS_READY
					);
				} else if($key == "primary"){ 
					Yii::app()->clientScript->registerScript(
					   'primary',
					   '$.smallBox({
								title : "Acción correcta",
								content : "' . $message . '",
								color : "#296191",
								iconSmall : "fa fa-thumbs-up bounce animated",
								timeout : 4000
							})',
					   CClientScript::POS_READY
					);
				}
			}?>

		


  //$("#img_historico").elevateZoom({scrollZoom : true, zoomType : "lens", lensShape : "square", lensSize : 500, lenszoom: true});
  	/*$('#img_historico').elevateZoom({
    	zoomType: "inner",
		cursor: "crosshair",
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750,
		scrollZoom: true,
   	});*/
  	/*$('#zoom').click(function(){
  		
	});*/
		
		

    </script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/select2.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/summernote.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/fancybox.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/datatablejs.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modern-business.js"></script>
    
  </body>
</html>
