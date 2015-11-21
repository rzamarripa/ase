<?php

class SiteController extends Controller
{
	public $layout='//layouts/main';
	/**
	* Declares class-based actions.
	*/
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction', 
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	/**
	* This is the default 'index' action that is invoked
	* when an action is not explicitly requested by users.
	*/
	public function actionDashboard($id)
	{
		$this->render("dashboard",array('id'=>$id));
	}
	
	public function actionIndex()
	{		
		if(isset($_POST["Encuesta"])){
			if(Yii::app()->user->isGuest){
				$hasRespondidoInvitado = RespuestasEncuesta::model()->exists("encuesta_did = :e and ip = :ip",array(":e"=>$_POST["Encuesta"]["id"], ":ip"=>$_SERVER["REMOTE_ADDR"]));
				if(!$hasRespondidoInvitado){
					$usuarioActual = Usuario::model()->obtenerUsuarioActual();
					$respuesta = OpcionesEncuesta::model()->find("id = " . $_POST["OpcionesEncuesta"]["id"]);
					$respuesta->votos++;
					$registrarQuien = new RespuestasEncuesta;
					$registrarQuien->respuesta_did = $respuesta->id;
					$registrarQuien->encuesta_did = $_POST["Encuesta"]["id"];
					$registrarQuien->ip = $_SERVER["REMOTE_ADDR"];
					$registrarQuien->fechaCreacion_f = date("Y-d-m H:i:s");
					$registrarQuien->estatus_did = 1;
					$registrarQuien->usuario_did = $usuarioActual->id;
					if($respuesta->save() && $registrarQuien->save())
						$this->redirect(array('encuesta/analisis',"id"=>$_POST["Encuesta"]["id"]));
						
				}else{
					Yii::app()->user->setFlash("warning","Ya contestó esta encuesta, no se registró su intento.");
					$this->redirect(array('encuesta/analisis',"id"=>$_POST["Encuesta"]["id"]));
				}							
			}else{
				$usuarioActual = Usuario::model()->obtenerUsuarioActual();
				$hasRespondidoRegistrado = RespuestasEncuesta::model()->exists("encuesta_did = :e and usuario_did = :u",array(":e"=>$_POST["Encuesta"]["id"], ":u"=>$usuarioActual->id));
				if(!$hasRespondidoRegistrado){
					$usuarioActual = Usuario::model()->obtenerUsuarioActual();
					$respuesta = OpcionesEncuesta::model()->find("id = " . $_POST["OpcionesEncuesta"]["id"]);
					$respuesta->votos++;
					$registrarQuien = new RespuestasEncuesta;
					$registrarQuien->respuesta_did = $respuesta->id;
					$registrarQuien->encuesta_did = $_POST["Encuesta"]["id"];
					$registrarQuien->ip = $_SERVER["REMOTE_ADDR"];
					$registrarQuien->fechaCreacion_f = date("Y-d-m H:i:s");
					$registrarQuien->estatus_did = 1;
					$registrarQuien->usuario_did = $usuarioActual->id;
					if($respuesta->save() && $registrarQuien->save())
						$this->redirect(array('encuesta/analisis',"id"=>$_POST["Encuesta"]["id"]));
						
				}else{
					Yii::app()->user->setFlash("warning","Ya contestó esta encuesta, no se registró su intento.");
					$this->redirect(array('encuesta/analisis',"id"=>$_POST["Encuesta"]["id"]));
				}		
			}							
		}else{
			$carruseles = Carrusel::model()->findAll("estatus_did = 1");
			$noticias = Noticia::model()->findAll("estatus_did = 1 and tipo=0");
			$encuestas = Encuesta::model()->findAll("estatus_did = 1");
			$this->render('index',array(
				"carruseles" => $carruseles,
				"noticias" => $noticias,
				"encuestas" => $encuestas,
			));
		}
	}
	
	/**
	* This is the action to handle external exceptions.
	*/
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";
		
				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				$this->redirect(array('contactoenviado'));
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	
	public function actionContactoenviado()
	{
		$this->render('contactoenviado');
	}
	
	/**
	* Displays the login page
	*/
	public function actionLogin()
	{
		$model=new LoginForm;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			Yii::app($model->username . ' se ha logueado','info','application.*');
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				Yii::app()->db->createCommand("insert into Actividad (mensaje, usuario) Values ('Ha iniciado sesión', '" . $model->username . "')")->execute();
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	* Logs out the current user and redirect to homepage.
	*/
	public function actionLogout()
	{
		Yii::app()->db->createCommand("insert into Actividad (mensaje, usuario) Values ('Ha cerrado sesión', '" . Yii::app()->user->name . "')")->execute();
		Yii::app()->user->logout();	  	
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRecuperar()
	{
		if(isset($_POST["Usuario"])){
			$existe = Usuario::model()->exists("correo = '" . $_POST["Usuario"]["correo"] . "'");
			if($existe){
				$usuario = Usuario::model()->find("correo = '" . $_POST["Usuario"]["correo"] . "'");
				$contrasena = rand(10000,99999);
				$usuario->contrasena = md5($contrasena);
				$usuario->save();
				
				$headers = array(
				    'MIME-Version: 1.0',
				    'Content-type: text/html; charset=UTF-8'
				);
				Yii::app()->email->send('AHM',$usuario->correo,'Recuperación de Contraseña',"Su contraseña ha sido cambiada, la nueva es " . $contrasena,$headers);
			}
		}
		$usuario = new Usuario;		
		$this->render("recuperar",array("model"=>$usuario));
	}
	
	public function actionAbout(){
		$this->render("about");
	}

	public function actionConocenos(){
		$this->render("conocenos");
	}
	
	
}