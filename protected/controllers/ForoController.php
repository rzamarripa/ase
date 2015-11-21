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
				'actions'=>array('autocompletesearch','index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
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
		$foros = Foro::model()->findAll("estatus_did = 1 and identificador = 0");
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'usuarioActual'=>$usuarioActual,
			'foros'=>$foros,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Foro;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Foro']))
		{
			date_default_timezone_set('America/Monterrey');
				
			$usuarioActual = Usuario::model()->obtenerUsuarioActual();
			$model->attributes=$_POST['Foro'];
			$model->autor = $usuarioActual->nombre . " " . $usuarioActual->apPaterno . " " . $usuarioActual->apMaterno;
			$model->fecha_f = date("Y-d-m H:m:s");
			$model->respuestas++;
			if(isset($_GET["id"])){
				$model->identificador = $_GET["id"];
				$temaPrincipal = $this->loadModel($_GET["id"]);				
				$temaPrincipal->respuestas++;
				$temaPrincipal->fecha_f = date("Y-d-m H:i:s", strtotime($temaPrincipal->fecha_f));
				$temaPrincipal->ult_respuesta = date("Y-d-m H:i:s", strtotime($temaPrincipal->ult_respuesta));
				$temaPrincipal->save();	
			}				
			else{
				$model->respuestas=0;
				$model->identificador = 0;
			}
				
			$model->ult_respuesta = date("Y-d-m H:m:s");
			$model->estatus_did = 2;
			$model->usuario_did = $usuarioActual->id;

			if($model->save()){				
				if(isset($_GET["foro"])){					
					Yii::app()->user->setFlash('info', "Se envió tu respuesta");				
					$this->redirect(array('view','id'=>$_GET["foro"]));
				}					
				else{
					Yii::app()->user->setFlash('info', "Se envió tu foro, lo publicarán lo antes posible");
					$this->redirect(array('index'));
				}
					
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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$foros = Foro::model()->findAll("estatus_did = 1 and identificador = 0");
		$this->render("index", array(
			"foros"=>$foros
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

	

}
