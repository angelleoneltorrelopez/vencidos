<?php
$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
						"buttons"=>array(
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/><strong> Crear</strong>',
								'url'=>'create', "htmlOptions" => array("class"=>"btn btn-info")),

								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/delete.png"/><strong> Borrar</strong>',
								'url'=>'#', "htmlOptions" => array("class"=>"btn btn-info",'submit'=>array('delete','id'=>$model->idasignacion),'confirm'=>
								'Seguro querer borrar este Politica?')),

								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/exchange.png"/><strong> Actualizar</strong>',
								'url'=>array('update','id'=>$model->idasignacion), "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/search.png"/><strong> Buscar</strong>',
								'url'=>'admin', "htmlOptions" => array("class"=>"btn btn-info")),

						)
				));

?>

<h1>Vista Politica ID: <?php echo $model->idasignacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'htmlOptions' => array('class'=>'detail-view','style'=>'background-color:#FFFFFF; box-shadow: 0px 0px 2px 0 black;'),
'type'=>'striped',
'attributes'=>array(
	  array(
		  'name'=>'idasignacion',
		   ),
		array(
			'name'=>'idcasa',
			'value'=>$model->casa->nombrecasa,
			 ),
		array(
			'name'=>'idproveedor',
			'value'=>$model->proveedor->nombreprov,
			 ),
			 array(
	 		 'name'=>'politica',
	 		 'value'=>function($model){
	 				 if ($model->politica == -1) {	$result = "No Devolucion";	}
	 				 if ($model->politica == 0) {	$result = "En el Mes";	}
	 				 if ($model->politica == 1) {	$result = "1";	}
	 				 if ($model->politica == 2) {	$result = "2";	}
	 				 if ($model->politica == 3) {	$result = "3";	}
	 				 if ($model->politica == 4) {	$result = "4";	}
	 				 if ($model->politica == 5) {	$result = "5";	}
	 										 return $result;

	 						 }
	 			),
),
)); ?>
