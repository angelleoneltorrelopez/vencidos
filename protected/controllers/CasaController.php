<?php

class CasaController extends Controller
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
'actions'=>array('index','view'),
'users'=>array('@'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','admin','generarpdf','excel'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('update','delete'),
'users'=>array('admin','angel'),
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
$model=new Casa;

// Uncomment the following line if AJAX validation is needed
$this->performAjaxValidation($model);

if(isset($_POST['Casa']))
{
$model->attributes=$_POST['Casa'];
if($model->save())
$this->redirect(array('view','id'=>$model->idcasa));
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
$this->performAjaxValidation($model);

if(isset($_POST['Casa']))
{
$model->attributes=$_POST['Casa'];
if($model->save())
$this->redirect(array('view','id'=>$model->idcasa));
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
$dataProvider=new CActiveDataProvider('Casa');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Casa('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Casa']))
$model->attributes=$_GET['Casa'];

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
$model=Casa::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='casa-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}


public function actionGenerarPdf()
{
$session=new CHttpSession;
$session->open();
if(isset($session['casa_record']))
//Si hay datos filtrados entonces usar la criteria guardada en la sesion (esto lo guardamos en la funcion search() del modelo)
{
$model=Casa::model()->findAll($session['casa_record'],array('order'=>'nombrecasa ASC'));
}
else
//Si no hay datos filtrados exportar todo
{
$model =Casa::model()->findAll(array('order'=>'nombrecasa ASC'));
}
$mPDF1 = Yii::app()->ePdf->mpdf('utf-8','Letter','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
$mPDF1->useOnlyCoreFonts = true;
$mPDF1->SetTitle("Reporte - Casa");
$mPDF1->SetAuthor(Yii::app()->user->name);
$mPDF1->SetWatermarkText("Vencidos");
$mPDF1->showWatermarkText = true;
$mPDF1->watermark_font = 'DejaVuSansCondensed';
$mPDF1->watermarkTextAlpha = 0.05;
$mPDF1->SetDisplayMode('fullpage');
$mPDF1->WriteHTML($this->renderPartial('pdfReport', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
$mPDF1->Output('Reporte - Casa '.date('YmdHis').'.pdf','I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
exit;
}



 public function actionExcel(){
        $objPHPExcel = new PHPExcel();

        $session=new CHttpSession;
        $session->open();
        if(isset($session['casa_record']))
        //Si hay datos filtrados entonces usar la criteria guardada en la sesion (esto lo guardamos en la funcion search() del modelo)
        {
        $model=Casa::model()->findAll($session['casa_record'],array('order'=>'nombrecasa ASC'));
        }
        else
        //Si no hay datos filtrados exportar todo
        {
        $model =Casa::model()->findAll(array('order'=>'nombrecasa ASC'));
        }

        // Set document properties
        $objPHPExcel->getProperties()->setCreator(Yii::app()->user->name)
             ->setLastModifiedBy(Yii::app()->user->name)
             ->setTitle("Reporte Vencidos")
             ->setSubject("Casa")
             ->setDescription("Reporte de productos en Casa segun la busqueda realizada")
             ->setKeywords("Vencidos, Casa, Reporte");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Casa');

$cont = 1;
        // Miscellaneous glyphs, UTF-8
        $sheet = $objPHPExcel->getActiveSheet();
        foreach($model as $row):

          $sheet->getStyle('A'.$cont)->getAlignment()->applyFromArray(
          array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)  );
          $sheet->getStyle('B1')->getAlignment()->applyFromArray(
          array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,)  );

          $cont++;


           $sheet->setCellValue('A'.$cont,$row->idcasa);
           $sheet->setCellValue('B'.$cont,$row->nombrecasa);
         endforeach;

         foreach(range('A',$sheet->getHighestDataColumn()) as $columnID)
{
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}
        // FIN ITEMS
        // Rename worksheet
        $sheet->setTitle('Casa');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    //    $objPHPExcel->setActiveSheetIndex(0);

        // Save a xls file
        $filename = 'Casa';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');
        unset($this->objWriter);
        unset($this->objWorksheet);
        unset($this->objReader);
        unset($this->objPHPExcel);
        exit();
    }//fin del método actionExcel


}
