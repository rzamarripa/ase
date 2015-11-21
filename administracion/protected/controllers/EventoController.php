<?php

class EventoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('autocompletesearch'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete','geteventos','listar','cambiar','notificar'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Evento;
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Evento']))
		{
			$model->attributes=$_POST['Evento'];
			$model->estatus_did = 1;
			if($model->save())
				$this->redirect(array('index'));
		} 
		else if(isset($_POST["title"]))
		{
			$model->nombre=$_POST['title'];
			$model->fechaInicio_ft=$_POST['start'];
			$model->fechaFin_ft=$_POST['end'];
			$model->estatus_did = 1;
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{	
		// $this->performAjaxValidation($model);

		if(isset($_POST['id']))
		{
			$model=$this->loadModel($_POST["id"]);
			$model->nombre=$_POST['title'];
			$model->fechaInicio_ft=$_POST['start'];
			$model->fechaFin_ft=$_POST['end'];
			$model->estatus_did = 1;
			if($model->save())
				$this->redirect(array('index'));
		}else{
			$model=$this->loadModel($id);			
			if(isset($_POST["Evento"])){
				$model->attributes = $_POST["Evento"];
				$model->estatus_did = 1;
				$model->fechaInicio_ft = date("Y-d-m H:i:s", strtotime($model->fechaInicio_ft));
				$model->fechaFin_ft = date("Y-d-m H:i:s", strtotime($model->fechaFin_ft));
				if($model->save())
					$this->redirect(array('index'));
			}
			$this->render("update",array('model'=>$model));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		$model = $this->loadModel($_POST["id_"]);
		$model->estatus_did = 2;
		if($model->save())
			$this->redirect(array("index"));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Evento;
		if(isset($_POST["Evento"]))
		{
			$model->attributes = $_POST["Evento"];			
			$model->estatus_did = 1;
			if($model->save()){
				Yii::app()->user->setFlash("info","Se agregó el evento: " . $model->nombre . ".");
				$this->redirect(array("index"));
			}
		}else{
			$dataProvider=new CActiveDataProvider('Evento');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'model'=>$model
			));
		}
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Evento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evento']))
			$model->attributes=$_GET['Evento'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Evento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAutocompletesearch()
	{
	    $q = "%". $_GET['term'] ."%";
	 	$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
			$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");
			$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
	    $cursor = Evento::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	public function actionGeteventos()
	{
		$result = array();
		$cursor = Evento::model()->findAll("estatus_did = 1");
		foreach ($cursor as $valor)	
			$result[]=Array('id' => $valor->id,
											'title' => $valor->nombre,  			                
			                'start' => date("Y-m-d H:i:s", strtotime($valor->fechaInicio_ft)),
			                'end' => date("Y-m-d H:i:s", strtotime($valor->fechaFin_ft)),
			                'description' => $valor->descripcion,
			                'tip' => '<strong>' . $valor->nombre . "</strong><br/>" . 
			                					$valor->descripcion . "<br/>".
			                					"<strong>Inicia :</strong> " . date("d-m-Y H:i:s", strtotime($valor->fechaInicio_ft)) . "<br/>".
			                					"<strong>Termina:</strong> " . date("d-m-Y H:i:s", strtotime($valor->fechaFin_ft)));
    echo json_encode($result);
    Yii::app()->end();
	}
	
	public function actionListar()
	{
		$eventos = Evento::model()->findAll();
		$this->render("listar",array("eventos"=>$eventos));
	}
	
	public function actionCambiar($id){
		if(isset($_GET["estatus"])){
			$model = $this->loadModel($id);
			$model->estatus_did = $_GET["estatus"];
			$model->fechaInicio_ft = date("Y-d-m H:i:s", strtotime($model->fechaInicio_ft));
			$model->fechaFin_ft = date("Y-d-m H:i:s", strtotime($model->fechaFin_ft));
			if($model->save()){
				if($model->estatus_did == 1)
					Yii::app()->user->setFlash("info","Se publicó el evento: " . $model->nombre . ".");
				else
					Yii::app()->user->setFlash("warning","Se dejó de publicar el evento: " . $model->nombre . ".");
				Yii::app()->db->createCommand("insert into Actividad (mensaje, usuario) Values ('Cambió de Estatus del evento " . $model->nombre . " a " . $model->estatus->nombre . "', '" . Yii::app()->user->name . "')")->execute();
				$this->redirect(array("evento/listar"));
			}
		}
	}
	
	public function actionNotificar($id)
	{
		$eventos = Evento::model()->findAll();
		$model = Evento::model()->findByPK($id);
		$contactos = Email::model()->findAll("estatus_did = 1");
		$destinatarios = array();
		if(count($contactos)>0){
			foreach($contactos as $contacto){
				$destinatarios[] = $contacto->correo;
			}
		}
		$this->avisarAsociados($destinatarios, $model->nombre);
		$this->redirect(array("evento/listar"));
	}
	
	public function avisarAsociados($to, $body)
	{
		$headers = array(
		    'MIME-Version: 1.0',
		    'Content-type: text/html; charset=UTF-8'
		);
		Yii::app()->email->send('AHM',$to,'Boletín de la Semana','Nuevo evento:' . $body,$headers);
	}

}
