<?php
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+2 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$sql = "SELECT COUNT(Id) FROM ingreso where Politica = -1 and Estado = 0 and (DATE(Caducidad) BETWEEN '$fecha' AND '$nuevafecha');";
 $comando=Yii::app()->db->createCommand($sql)->queryColumn();
$resp = $comando[0];
//if($resp > 0){

		Yii::app()->user->setFlash('error',
	 $resp.' Productos<strong> Sin Devolucion!</strong> vencen entre 2 Meses.');
//}
$this->widget('bootstrap.widgets.TbAlert', array(
        'fade'=>true, // use transitions?
         // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    ));


Yii::app()->clientScript->registerScript(
       'myHideEffect',
       '$(".flash-error").animate({opacity: 1.0}, 3000).fadeOut("slow");',
       CClientScript::POS_READY
    );

$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
            "buttons"=>array(
                array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/><strong> Crear</strong>',
								'url'=>'http://52.39.84.134/vuejs/', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/pdf.png"/><strong> Pdf</strong>',
								'url'=>'generarpdf', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/excel.png"/><strong> Excel</strong>',
								'url'=>'excel', "htmlOptions" => array("class"=>"btn btn-info")),
            )
        ));



    Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('ingreso-grid', {
    data: $(this).serialize()
    });
    return false;
    });
    ");


    ?>


<h1>Busqueda de Ingreso</h1>
<?php $this->widget('booster.widgets.TbGridView',array(
'type' => 'hover ',
'htmlOptions' => array('class'=>'well','style'=>'background-color: #FFFFFF;'),
'id'=>'ingreso-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
				 'name'=>'idproducto',
				 'value'=>'$data->producto->nombre_productos',
         'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
				),
		array(
				 'name'=>'idcasa',
				 'value'=>'$data->casa->nombrecasa',
         'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
				),
				array(
				     'name'=>'idproveedor',
				     'value'=>'$data->proveedor->nombreprov',
             'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
					  ),
		array(
			'name' => 'Politica',
			'filter' => array(
					'-1'  => 'No Devolucion',
					'0'  => 'En el mes',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5'
			),
			'value' => function($model){
				  if ($model->Politica == -1) {	$result = "No Devolucion";	}
					if ($model->Politica == 0) {	$result = "En el Mes";	}
					if ($model->Politica == 1) {	$result = "1";	}
					if ($model->Politica == 2) {	$result = "2";	}
					if ($model->Politica == 3) {	$result = "3";	}
					if ($model->Politica == 4) {	$result = "4";	}
					if ($model->Politica == 5) {	$result = "5";	}
                      return $result;

              },
              'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
		    ),
		array(
			'name' => 'Caducidad',
			'filter' => CHtml::listData(Ingreso::model()->findAll(array('condition'=>'Estado = 0', 'order'=>'Caducidad ASC')), 'Caducidad', 'Caducidad'),
		  'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),  ),
      array(
  				 'name'=>'Lote',
           'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
  				),
		array(
			'name' => 'Estado',
			'filter' => array('0'=>'Activo','1'=>'Inactivo'),
			'value'=> '$data["Estado"]==0?"Activo":"Inactivo"',
      'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
		    ),


array(
'class'=>'booster.widgets.TbButtonColumn',
'headerHtmlOptions'=>array('style'=>'background-color: #009688;'),
),
),
'emptyText' => 'No se encontro ningun producto!',

'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',

)); ?>
