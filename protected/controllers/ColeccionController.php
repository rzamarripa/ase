<?php

class ColeccionController extends Controller
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
				'actions'=>array('autocompletesearch','index','actualizarvolumenes','verimagenes',
												'loadimage','imagenhd','verexp','actualizarexpedientes','verbotonexpediente','buscar'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','create','update','admin','delete'),
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
		$model=new Coleccion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Coleccion']))
		{
			$model->attributes=$_POST['Coleccion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Coleccion']))
		{
			$model->attributes=$_POST['Coleccion'];
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
		$this->render('index',array(
			
		));
	}
	
	public function actionBuscar(){
		if(isset($_POST["busqueda"])){
			
			$q = new CDbCriteria();
			$q->addSearchCondition('folio', $_POST["busqueda"]);
			$detalle = Archivo::model()->findAll($q);
			$this->renderPartial("_verdetalle",array("detalles"=>$detalle));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Coleccion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Coleccion']))
			$model->attributes=$_GET['Coleccion'];

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
		$model=Coleccion::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='coleccion-form')
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
	      $cursor = Coleccion::model()->findAll($criteria);
				foreach ($cursor as $valor)	
					$result[]=Array('label' => $valor->nombre,
					                'value' => $valor->nombre,
				  	              'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}

	public function actionActualizarvolumenes()
	{ 
		$volumenes=Volumen::model()->findAll('coleccion_did=:id', array(':id'=>(int) $_POST['id']));
		
		$volumenesArray=CHtml::listData($volumenes,'id','nombre');
		
		if(count($volumenesArray)>0){
			echo "<option value=''>Seleccione un Volumen</option>";	
			foreach($volumenes as $volumen)
				echo CHtml::tag('option', array('value'=>CHtml::encode($volumen->id,true), 'data-type'=>($volumen->tieneExpediente_did == 1)? "si": "no"),$volumen->nombre);
		}else{
			echo "<option value=''>No hay Volúmenes</option>";		
		}	
			
	}
	
	public function actionActualizarexpedientes()
	{		
		$volumen = Volumen::model()->find("id = " . $_POST["id"]);
		if($volumen->tieneExpediente_did == 2){
			
			$archivoHistorico = ArchivoHistorico::model()->find("volumen_did = " . $volumen->id);			
			$this->renderPartial("_verboton",array("archivoHistorico"=>$archivoHistorico));
			
		}else{
			
			$expedientes=Expediente::model()->findAll('volumenAño_did=:id',array(':id'=>(int) $_POST['id']));
			$expedientesArray=CHtml::listData($expedientes,'id','nombre');

			if(count($expedientesArray)>0){				
				echo "<option value=''>Seleccione un Expediente</option>";
				foreach($expedientesArray as $value=>$expediente)
					echo CHtml::tag('option', array('value'=>$value),CHtml::encode($expediente),true);
			}				
			else
				echo "<option value=''>No hay Expedientes</option>";
		}
	}
	
	public function actionVerbotonexpediente(){

		$archivoHistorico = ArchivoHistorico::model()->find("expediente = " . $_POST["id"]);			
		$this->renderPartial("_verboton",array("archivoHistorico"=>$archivoHistorico));		
	}

  public function actionVerimagenes($id){   
  	/*
  		echo "<pre>"; print_r($_GET); echo "</pre>";
		exit; 
	*/
    $consecutivo = 1;
    $resolution = 'low';
    if(isset( $_GET['c'] ))
    {
      $consecutivo = (int) $_GET['c'];
    }
    if(isset( $_GET['res'] ))
    {
      $resolution = $_GET['res'];
    }
    if(isset($_GET["t"])){
	    $archivoHistorico = ArchivoHistorico::model()->find("volumen_did = ". $id);	    
	    $id_arch = $archivoHistorico->id;
    }else{
	    $id_arch = $id;
    }   	
    
    $model = ArchivoDetalle::model()->findByAttributes( array('archivoId' => $id_arch, 'consecutivo' => $consecutivo, ));
    
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    
    $this->render("view_historico", array('model' => $model, 'resolution' => $resolution) );
  }
  
  public function actionImagenhd($id, $consecutivo){
    $model = ArchivoHistoricoDetalle::model()->findByAttributes( array('Id_Archivo' => $id, 'Consecutivo' => $consecutivo ));
    $s = pack('H*', strtolower($model->imagenjpeg));
    echo '<img alt="" src="data:image/jpeg;base64,'. base64_encode($s) .'" />';
  }
}
