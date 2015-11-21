<?php

class NoticiaController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','cambiar'),
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
		$model=new Noticia;
		$up = new UploadPhoto;
		date_default_timezone_set("America/Monterrey");
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Noticia']))
		{
			$usuarioActual = Usuario::model()->obtenerUsuarioActual();
			if(isset($_GET["tipo"]) && $_GET["tipo"] == "not"){
				$model->attributes = $_POST["Noticia"];
				$model->fecha_f = date("Y-d-m H:i:s");
				$model->tipo = 0;
				$model->usuario_did = $usuarioActual->id;
				
				$up->attributes= $_POST['UploadPhoto'];				
				$up->foto = CUploadedFile::getInstance($up,'foto');				
				$documento = str_replace(" ", "_", $up->foto);
				$documento = date("Ymd_Gi")."__".$documento;
				$fileDocumento = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'noticias' . DIRECTORY_SEPARATOR . $documento;
				$up->foto->saveAs($fileDocumento);
				$model->ruta = $documento;
				$model->estatus_did = 1;

			} else if(isset($_GET["tipo"]) && $_GET["tipo"] == "pub"){
				$model->attributes = $_POST["Noticia"];
				$model->fecha_f = date("Y-d-m H:i:s");
				$model->tipo = 1;
				$model->usuario_did = $usuarioActual->id;
				$model->estatus_did = 2;
				
				$up->attributes= $_POST['UploadPhoto'];				
				$up->foto = CUploadedFile::getInstance($up,'foto');				
				$documento = str_replace(" ", "_", $up->foto);
				$documento = date("Ymd_Gi")."__".$documento;
				$fileDocumento = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'noticias' . DIRECTORY_SEPARATOR . $documento;
				$up->foto->saveAs($fileDocumento);
				$model->ruta = $documento;

			}
			
			if($model->save()){				
				Yii::app()->user->setFlash("info","Se ha publicado una noticia.");
				$this->redirect(array('index','tipo'=>$_GET["tipo"]));
			}				
		}

		$this->render('create',array(
			'model'=>$model,
			'up'=>$up,
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
		$up = new UploadPhoto;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Noticia']))
		{
			$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'images/noticias' . DIRECTORY_SEPARATOR . $model->ruta;
			$up->foto = CUploadedFile::getInstance($up, 'foto');
      
      	
      if($up->foto != "")
      {
      	if(isset($file)){
					while(is_file($file) == TRUE)
	        {	            
	            unlink($file);
	        }
	      }	  
      	
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
				$file = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . 'images/noticias' . DIRECTORY_SEPARATOR . $nombreArchivo;
				$up->foto->saveAs($file);
				$model->ruta = $nombreArchivo;
			}
			$model->attributes=$_POST['Noticia'];			

			try{
				if($model->save()){
					$this->redirect(array('index','tipo'=>$_GET["tipo"]));
				}
			}	catch(Exception$e){
				echo $e->getMessage();
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'up' => $up,
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
		if(isset($_GET["tipo"]) && $_GET["tipo"] == "not"){
			$noticias = Noticia::model()->findAll("tipo = 0");
			$this->render('noticia',array(
				'noticias'=>$noticias,
			));
		} else if(isset($_GET["tipo"]) && $_GET["tipo"] == "pub"){
			$publicaciones = Noticia::model()->findAll("tipo = 1");
			$this->render('publicacion',array(
				'publicaciones'=>$publicaciones,
			));			
		} else{
			$dataProvider=new CActiveDataProvider('Noticia');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Noticia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Noticia']))
			$model->attributes=$_GET['Noticia'];

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
		$model=Noticia::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='noticia-form')
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
	       	$cursor = Noticia::model()->findAll($criteria);
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
			$model->estatus_did = $_GET["estatus"];
			$model->fecha_f = date("Y-d-m H:i:s", strtotime($model->fecha_f));
			if($model->save()){
				if($model->estatus_did == 1)
					Yii::app()->user->setFlash("info","Se publicó la noticia: " . $model->titulo . ".");
				else
					Yii::app()->user->setFlash("warning","Se dejó de publicar la noticia: " . $model->titulo . ".");
				Yii::app()->db->createCommand("insert into Actividad (mensaje, usuario) Values ('Cambió de Estatus la Noticia " . $model->titulo . " a " . $model->estatus->nombre . "', '" . Yii::app()->user->name . "')")->execute();
				$this->redirect(array("noticia/index",'tipo'=>$_GET["tipo"]));
			}
		}
	}

}
