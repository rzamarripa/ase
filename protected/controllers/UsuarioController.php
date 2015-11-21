<?php

class UsuarioController extends Controller
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
				'actions'=>array('autocompletesearch','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','update','admin','delete','subir'),
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
		$model=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			
			$model->attributes=$_POST['Usuario'];
			$model->estatus_did = 1;
			$model->tipoUsuario_did = 4;
			$model->fechaCreacion_f = date("Y-d-m H:i:s");
			$model->contrasena = md5($model->contrasena);
			
			if(isset($_POST["noticias"])){
				$email = new Email;
				$email->nombre = $model->nombre . " " . $model->apPaterno . " " . $model->apMaterno;
				$email->direccion = $model->domCalle . " " . $model->domNo . " " . $model->domColonia;
				$email->telefono = $model->telefono;
				$email->correo = $model->correo;
				$email->estatus_did = 1;
				$email->fecha_f = date("Y-d-m");
				$email->save();
			}
			if($model->save())
				$this->redirect(array('site/index'));
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

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
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
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

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
		$model=Usuario::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
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
	       	$cursor = Usuario::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}

	public function actionCambiar($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('site/logout','id'=>$model->id));
		}

		$this->render('cambiar',array(
			'model'=>$model,
		));
	}

	public function actionSubir($id)
	{			
		$model = $this->loadModel($id);
		
		$up = new UploadPhoto;
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
		
		if(isset($_POST['UploadPhoto']))
		{				
			
			$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'administracion/fotos' . DIRECTORY_SEPARATOR . $model->foto;
			if(isset($file)){
				while(is_file($file) == TRUE)
        {	            
            unlink($file);
        }
	        
	      $up->foto = CUploadedFile::getInstance($up, 'foto');
	      if($up->foto != "")
	      {
					$nombreArchivo = str_replace(" ", "_", $up->foto);
					$nombreArchivo = str_replace(" ", "_", $up->foto);
					$nombreArchivo = str_replace("ñ", "n", $nombreArchivo);
					$nombreArchivo = str_replace("á", "a", $nombreArchivo);
					$nombreArchivo = str_replace("é", "e", $nombreArchivo);
					$nombreArchivo = str_replace("í", "i", $nombreArchivo);
					$nombreArchivo = str_replace("ó", "o", $nombreArchivo);
					$nombreArchivo = str_replace("ú", "u", $nombreArchivo);
					$nombreArchivo = str_replace("Á", "A", $nombreArchivo);
					$nombreArchivo = str_replace("É", "E", $nombreArchivo);
					$nombreArchivo = str_replace("Í", "I", $nombreArchivo);
					$nombreArchivo = str_replace("Ó", "O", $nombreArchivo);
					$nombreArchivo = str_replace("Ú", "U", $nombreArchivo);
					$nombreArchivo = date("Ymd_Gi")."_".$nombreArchivo;
					$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'administracion/fotos' . DIRECTORY_SEPARATOR . $nombreArchivo;
					
					$model->foto = $nombreArchivo;
								
					if($up->foto->saveAs($file) && $model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
				else
				{
					$model->foto = "sin_imagen.jpg";
					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
		}

		$this->render('subir',array(
			'model'=>$model,
			'up'=>$up,			
		));
	}
}