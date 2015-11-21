<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <title>Portal Web Mty</title>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"><!-- Basic Styles -->
    <link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.ico" />
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/bootstrap.min.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/zama.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/font-awesome.min.css';?>" media="screen" rel="stylesheet" type="text/css">
    <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/smartadmin-production.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/smartadmin-skins.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/summernote.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/cdntables.css';?>" media="screen" rel="stylesheet" type="text/css">    
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.qtip.min.css" media="screen" rel="stylesheet" >
    <!-- Full Calendar -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/fullcalendar.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/fullcalendar.print.css';?>" media="print" rel="stylesheet" type="text/css">    
    <!-- FAVICONS -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/favicon/favicon.ico';?>" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/favicon/favicon.ico';?>" rel="icon" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/css/fontface.css';?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/splash/sptouch-icon-iphone.png';?>" rel="apple-touch-icon">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/splash/touch-icon-ipad.png';?>" rel="apple-touch-icon" sizes=
    "76x76">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/splash/touch-icon-iphone-retina.png';?>" rel="apple-touch-icon"sizes="120x120">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/splash/touch-icon-ipad-retina.png';?>" rel="apple-touch-icon"sizes="152x152">
    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <!-- Startup image for web apps -->
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/splash/ipad-landscape.png';?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)"
    rel="apple-touch-startup-image">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/splash/ipad-portrait.png';?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)"
    rel="apple-touch-startup-image">
    <link href="<?php echo Yii::app()->theme->baseUrl . '/img/splash/iphone.png';?>" media="screen and (max-device-width: 320px)" rel="apple-touch-startup-image">
	<script src="<?php echo Yii::app()->theme->baseUrl . '/js/jquery-1.10.2.js';?>"></script>
    
    <script src="<?php echo Yii::app()->theme->baseUrl . '/js/jquerymigrate.js';?>"></script>

  </head>

  <body class="">

      <header id="header">
			<div id="logo-group">
	        <!-- PLACE YOUR LOGO HERE -->
	        <span id="logo"><img alt="Logo" src="<?php echo Yii::app()->theme->baseUrl . '/img/logo.png';?>">Portal Web Admin</span> 
	        <!-- END LOGO PLACEHOLDER -->        
	 				<?php $mensajes = Contacto::model()->findAll("estatus_did = 1"); ?>
	        <span class="activity-dropdown" id="activity"> <b class="badge"><?php echo count($mensajes); ?></b></span> 
	        <!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
	        <div class="ajax-dropdown">
            Mensajes Pendientes
            <div class="ajax-notifications custom-scroll">
               
               <table class="table table-bordered table-hover table-condensed">
               		<thead>
               			<tr>
               				<th class="text-center">Asunto</th>
               				<th class="text-center">Acciones</th>
               			</tr>
               		</thead>
               		<tbody>
               			<?php foreach($mensajes as $mensaje){ ?>
											<tr>
												<td><?php echo CHtml::link($mensaje->mensaje, array("contacto/view", 'id'=>$mensaje->id)); ?></td>
												<td class="text-center"><?php echo CHtml::link("Leído",array("contacto/cambiar",'id'=>$mensaje->id,'estatus'=>2),array('class'=>'btn btn-xs btn-primary')); ?></td>
											</tr>
               			<?php } ?>
               		</tbody>
               </table>
            </div><!-- end notification content -->
            <!-- footer: refresh area -->
            <span><?php echo 'Hoy es: ' . date("d-m-Y H:i:s"); ?></span> 
            <!-- end footer -->
		       </div><!-- END AJAX-DROPDOWN -->
		    </div><!-- projects dropdown -->
		    <div id="project-context">
		    </div><!-- end projects dropdown -->
		    <!-- pulled right: nav area -->
		    <div class="pull-right">
		        <!-- collapse menu button -->
		        <div class="btn-header pull-right" id="hide-menu">
		            <span><a href="javascript:void(0);" title="Encoger Menú"><i class="fa fa-reorder"></i></a></span>
		        </div><!-- end collapse menu -->
		        <!-- logout button -->
		        <div class="btn-header transparent pull-right" id="logout">
		            <span><?php echo CHtml::link('<i class="fa fa-sign-out"></i>',array('site/logout'),array('data-logout-msg'=>"Está seguro que desea cerrar sesión")); ?></span>
		        </div><!-- end logout button -->
		        <!-- fullscreen button -->
		        <div class="btn-header transparent pull-right" id="fullscreen">
		            <span><a href="javascript:void(0);" onclick="launchFullscreen(document.documentElement);" title="Pantalla completa"><i class="fa fa-desktop"></i></a></span>
		        </div><!-- end fullscreen button -->		        
		    </div><!-- end pulled right: nav area -->
      </header>

      <aside id="left-panel">
        <!-- User info -->
		    <div class="login-info">
		        <span>
		        <!-- User image size is adjusted inside CSS, it should stay as it -->
		        <?php $usuarioActual = Usuario::model()->obtenerUsuarioActual(); ?>
		         <a href="<?php echo Yii::app()->createUrl("usuario/view",array('id'=>$usuarioActual->id))?>" id="show-shortcut">
		         	<img alt="me" class="online" src="<?php echo ($usuarioActual->foto != "") ? 
		         																				Yii::app()->baseUrl . '/fotos/' . $usuarioActual->foto : 
		         																				Yii::app()->theme->baseUrl . '/img/avatars/male.png';?>">
						 	<span><?php echo $usuarioActual->nombre; ?></span>
						 </a>
						</span>
		    </div>
		    <!-- end user info -->
		    
		    <nav>
		        <ul>		            
							<li class="active"><?php echo CHtml::link('<i class="fa fa-dashboard"></i> Cuadro de mando',array('site/index')); ?></li>           
			        <li><?php echo CHtml::link('<i class="fa fa-folder-open-o"></i> Secciones',array('seccion/index')); ?></li>
			        <li><?php echo CHtml::link('<i class="fa fa-file-o"></i> Noticias',array('noticia/index','tipo'=>'not')); ?></li>	
			        <li><?php echo CHtml::link('<i class="fa fa-desktop"></i> Galería de fotos',array('galeria/index')); ?></li>
			        <li><?php echo CHtml::link('<i class="fa fa-edit"></i> Encuesta',array('encuesta/index')); ?></li>	
			        <li><?php echo CHtml::link('<i class="fa fa-comments-o"></i> Foro',array('foro/index')); ?></li>	
			        <li><?php echo CHtml::link('<i class="fa fa-envelope-o"></i> Emailing',array('email/index')); ?></li>				        
			        <li><?php echo CHtml::link('<i class="fa fa-file-text-o"></i> Publicaciones',array('noticia/index','tipo'=>'pub')); ?></li>	
			        <li><?php echo CHtml::link('<i class="fa fa-calendar"></i> Calendario',array('evento/index')); ?></li>	
			        <li><?php echo CHtml::link('<i class="fa fa-comments"></i> Mensajes',array('contacto/index')); ?></li>	
			        <li><?php echo CHtml::link('<i class="fa fa-camera"></i> Carrusel',array('carrusel/index')); ?></li>	
			        <li><?php echo CHtml::link('<i class="fa fa-user"></i> Usuarios',array('usuario/index')); ?></li>	 
		        </ul>
		    </nav>
      </aside>

      <!-- MAIN PANEL -->
      <div id="main">     
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
		    <!-- MAIN CONTENT -->
		 
		    <div id="content"> 		    	
		    	<?php echo $content; ?> 
		    </div><!-- END MAIN CONTENT -->
      </div>

      <div id="shortcut">
          <div id="shortcut" style="display: block;">
          	<?php if(!Yii::app()->user->isGuest){ ?>
						<ul>
							<li>
								<li class="active"><?php echo CHtml::link('<span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mensajes <span class="label pull-right bg-color-darken">14</span></span> </span>',array('site/index'),array("class"=>"jarvismetro-tile big-cubes bg-color-blue")); ?></li> 

							</li>
							<li>
								<a href="#calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendario</span> </span> </a>
							</li>
							<li>
								<a href="#gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Mapa</span> </span> </a>
							</li>
							<li>
								<a href="#gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Galería </span> </span> </a>
							</li>
							<li>
								<?php echo CHtml::link('<span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>Cerrar Sesión</span> </span>', array('site/logout'), 
								array('class'=>'jarvismetro-tile big-cubes selected bg-color-pinkDark')); ?>
							</li>
						</ul>
						<?php } ?>
					</div>
      </div>		
      <script src="<?php echo Yii::app()->theme->baseUrl . '/js/jquery.qtip.min.js';?>"></script>
      <script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/pace/pace.min.js';?>"></script>	
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/summernote.min.js';?>"></script>
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/jquery.datatable.js';?>"></script>
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/bootstrap/bootstrap.min.js';?>"></script>
			 
			<!-- CUSTOM NOTIFICATION -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/notification/SmartNotification.js';?>"></script>
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/notificaciones.js';?>"></script>
			
			<!-- FULL CALENDAR -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/fullcalendar.min.js';?>"></script>
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/jquery-ui.custom.min.js';?>"></script>			
			 
			<!-- JARVIS WIDGETS -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/smartwidgets/jarvis.widget.min.js';?>"></script>
			 
			<!-- EASY PIE CHARTS -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js';?>"></script>

			<!-- SPARKLINES -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/sparkline/jquery.sparkline.min.js';?>"></script>
			 
			<!-- JQUERY VALIDATE -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/jquery-validate/jquery.validate.min.js';?>"></script>
			 
			<!-- JQUERY MASKED INPUT -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/masked-input/jquery.maskedinput.min.js';?>"></script>
			 
			<!-- JQUERY SELECT2 INPUT -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/select2/select2.min.js';?>"></script>
			 
			<!-- JQUERY UI + Bootstrap Slider -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/bootstrap-slider/bootstrap-slider.min.js';?>"></script>
			 
			<!-- browser msie issue fix -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/msie-fix/jquery.mb.browser.min.js';?>"></script>
			 
			<!-- FastClick: For mobile devices: you can disable this in app.js -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/plugin/fastclick/fastclick.js';?>"></script>

			<!-- MAIN APP JS FILE -->
			<script src="<?php echo Yii::app()->theme->baseUrl . '/js/app.js';?>"></script>
			 
			<!-- Your GOOGLE ANALYTICS CODE Below -->
			<script type="text/javascript">
	       
	      $(document).ready(function() {
	      
	      	pageSetUp();
	      	
				  $('#myTable').dataTable( {
				      "paging":   true,
				      "ordering": true,
				      "info":     true,
				      "stateSave": false,
				  });
				  
				 
				  $('#summernote').summernote({
					  height: 150,
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
						select: function(start, end, allDay) {
						 $('#myModal').modal('show');						 
						},
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
		        },
						editable: true,
						eventDrop: function(event, delta) {
						 start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
						 end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
						 $.ajax({
						 url: "<?php echo Yii::app()->createUrl('evento/update'); ?>",
						 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
						 type: "POST",
						 success: function(json) {
						 	$.smallBox({
								title : "Modificación",
								content : "Se movió de fecha correctamente el evento: " + event.title,
								color : "#739E73",
								iconSmall : "fa fa-thumbs-up bounce animated",
								timeout : 4000
							});
						 }
						 });
						},
						eventResize: function(event) {
						 start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
						 end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
						 $.ajax({
							 url: "<?php echo Yii::app()->createUrl('evento/update'); ?>",
							 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
							 type: "POST",
							 success: function(json) {
							 	$.smallBox({
									title : "Modificación",
									content : "Se modificó correctamente el evento: " + event.title,
									color : "#739E73",
									iconSmall : "fa fa-thumbs-up bounce animated",
									timeout : 4000
								});
							 }
						 });							 
						},
						eventClick: function (event) {
							if (confirm("¿Realmente quiere eliminar este evento?")) { 
								$.ajax({
									url: '<?php echo Yii::app()->createUrl("evento/delete"); ?>',
									data: 'id =' + event.id, 
									type: "POST", 
									success: function(json) { 
										 $.smallBox({
											title : "Ups",
											content : "Se dejó de publicar el evento correctamente",
											color : "#a90329",
											iconSmall : "fa fa-thumbs-down bounce animated",
											timeout : 4000
										});
										history.go(0);
									} 
								});
							}							
						}
				  });
				  
				  					  
				});
				
			</script>
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
			
  </body>
</html>