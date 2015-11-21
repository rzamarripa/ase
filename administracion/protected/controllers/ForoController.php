<?php

class ForoController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','cambiar','cambiarvisibilidad'),
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
		date_default_timezone_set("America/Monterrey");		
		$usuarioActual = Usuario::model()->obtenerUsuarioActual();
		$this->render('view',array(
			'model'=>$this->loadModel($_GET["id"]),
			'usuarioActual'=>$usuarioActual,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Foro;
		date_default_timezone_set("America/Monterrey");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Foro']))
		{			
			$model->attributes=$_POST['Foro'];			
			$usuarioActual = Usuario::model()->obtenerUsuarioActual();
			
			if(isset($_GET["id"]))
			{
				$model->identificador = $_GET["id"];
				$temaPrincipal = $this->loadModel($_GET["id"]);				
				$temaPrincipal->respuestas++;
				$temaPrincipal->fecha_f = date("Y-d-m H:i:s", strtotime($temaPrincipal->fecha_f));
				$temaPrincipal->ult_respuesta = date("Y-d-m H:i:s", strtotime($temaPrincipal->ult_respuesta));
				$temaPrincipal->save();				
			} else {
				$model->identificador = 0;				
			}
			$model->respuestas = 0;
			$model->fecha_f = date("Y-d-m H:i:s");
			$model->ult_respuesta = date("Y-d-m H:i:s");
			$model->estatus_did = 1;
			$model->usuario_did = $usuarioActual->id;
			if($model->save()){
				Yii::app()->user->setFlash('info', "Agregó un nuevo mensaje: ' " . $model->mensaje. "'");
				$this->redirect(array('view','id'=> isset($_GET["id"]) ? $_GET["id"] : $model->id));
			}

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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Foro']))
		{
			$model->attributes=$_POST['Foro'];
			$model->fecha_f = date("Y-d-m H:i:s", strtotime($model->fecha_f));
			$model->ult_respuesta = date("Y-d-m H:i:s", strtotime($model->ult_respuesta));
			if($model->save()){
				Yii::app()->user->setFlash('info', "Modificó un nuevo mensaje: ' " . $model->mensaje. "'");
				$this->redirect(array('view','id'=>$model->id));
			}				
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{	
		if(isset($_GET["foro"])){
			$this->loadModel($id)->delete();
			$this->redirect(array('view','id'=>$_GET["foro"]));
		} else {
			Foro::model()->deleteAll("identificador = '" . $id . "'");			
			$this->loadModel($id)->delete();
			$this->redirect(array('index'));			
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$foros = Foro::model()->findAll("identificador = 0");
		$this->render('index',array(
			'foros'=>$foros,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Foro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Foro']))
			$model->attributes=$_GET['Foro'];

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
		$model=Foro::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='foro-form')
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
	       	$cursor = Foro::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	public function actionCambiar($id){
		if(isset($_GET["estatus"])){
			$model = $this->loadModel($id);
			$model->fecha_f = date("Y-d-m H:i:s", strtotime($model->fecha_f));
			$model->ult_respuesta = date("Y-d-m H:i:s", strtotime($model->ult_respuesta));
			$model->estatus_did = $_GET["estatus"];
			if($model->save()){
				if($model->estatus_did == 1)
					Yii::app()->user->setFlash("info","Se publicó el foro: " . $model->titulo . ".");
				else
					Yii::app()->user->setFlash("warning","Se dejó de publicar el foro: " . $model->titulo . ".");
				$this->redirect(array("index"));
			}
		}
	}
	
	public function actionCambiarvisibilidad($id){
		if(isset($_GET["estatus"])){
			$model = $this->loadModel($id);
			$model->estatus_did = $_GET["estatus"];
			$model->fecha_f = date("Y-d-m H:i:s", strtotime($model->fecha_f));
			$model->ult_respuesta = date("Y-d-m H:i:s", strtotime($model->ult_respuesta));

			if($model->save()){
				if($model->estatus_did == 1)
					Yii::app()->user->setFlash("info","Se publicó el foro: " . $model->titulo . ".");
				else
					Yii::app()->user->setFlash("warning","Se dejó de publicar el foro: " . $model->titulo . ".");
				if(isset($_GET["foro"]))
					$this->redirect(array("view",'id'=>$_GET["foro"]));
				else
					$this->redirect(array("view",'id'=>$id));
			}
		}
	}

}
