<?php

class EstadoController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','estado'),
				'users'=>array('admin','angel','keyla'),
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
		$model=new Estado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Estado']))
		{
			$model->attributes=$_POST['Estado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
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

		if(isset($_POST['Estado']))
		{
			$model->attributes=$_POST['Estado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Estado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Estado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Estado']))
			$model->attributes=$_GET['Estado'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Estado the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Estado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Estado $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='estado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionEstado()
	{
	$model=new Estado;
	  $session=new CHttpSession;
	  $session->open();
	  if(isset($session['Estado_record']))
	  //Si hay datos filtrados entonces usar la criteria guardada en la sesion (esto lo guardamos en la funcion search() del modelo)
	  {
	  $model=Estado::model()->findAll($session['Estado_record'],array('order'=>'Caducidad ASC, casa.nombrecasa ASC, producto.nombre_productos ASC'));
	  for ($i=0; $i < sizeof($model); $i++) {
	    $model[$i]->Estado = 0;
	    $model[$i]->update();
	  }
	  }
		/*
	  // Uncomment the following line if AJAX validation is needed
	  $this->performAjaxValidation($model);

	  if(isset($_POST['Admin']))
	  {
	  $model->attributes=$_POST['Admin'];
	//date("Y-m-d", strtotime("+1 month", strtotime($model->Caducidad)));

	$command = Yii::app()->db->createCommand();
	  $command->update('ingreso', array('Estado'=>$model->Estado,), 'Caducidad=:Caducidad AND Politica=:Politica', array(':Caducidad'=>$model->Caducidad,':Politica'=>-1));
	  $command->update('ingreso', array('Estado'=>$model->Estado,), 'Caducidad=:Caducidad AND Politica=:Politica', array(':Caducidad'=>$model->Caducidad,':Politica'=>0));
	  $command->update('ingreso', array('Estado'=>$model->Estado,), 'Caducidad=:Caducidad AND Politica=:Politica', array(':Caducidad'=>date("Y-m-d", strtotime("+1 month", strtotime($model->Caducidad))),':Politica'=>1));
	  $command->update('ingreso', array('Estado'=>$model->Estado,), 'Caducidad=:Caducidad AND Politica=:Politica', array(':Caducidad'=>date("Y-m-d", strtotime("+2 month", strtotime($model->Caducidad))),':Politica'=>2));
	  $command->update('ingreso', array('Estado'=>$model->Estado,), 'Caducidad=:Caducidad AND Politica=:Politica', array(':Caducidad'=>date("Y-m-d", strtotime("+3 month", strtotime($model->Caducidad))),':Politica'=>3));
	  $command->update('ingreso', array('Estado'=>$model->Estado,), 'Caducidad=:Caducidad AND Politica=:Politica', array(':Caducidad'=>date("Y-m-d", strtotime("+4 month", strtotime($model->Caducidad))),':Politica'=>4));
	  $command->update('ingreso', array('Estado'=>$model->Estado,), 'Caducidad=:Caducidad AND Politica=:Politica', array(':Caducidad'=>date("Y-m-d", strtotime("+5 month", strtotime($model->Caducidad))),':Politica'=>5));
*/
	  $this->redirect('admin');

	}
}
