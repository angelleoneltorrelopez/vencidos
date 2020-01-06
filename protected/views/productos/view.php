<?php

$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
						"buttons"=>array(
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/><strong> Crear</strong>',
								'url'=>'create', "htmlOptions" => array("class"=>"btn btn-info")),

								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/delete.png"/><strong> Borrar</strong>',
								'url'=>'#', "htmlOptions" => array("class"=>"btn btn-info",'submit'=>array('delete','id'=>$model->idproductos),'confirm'=>
								'Seguro querer borrar este producto? '.$model->nombre_productos)),

								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/exchange.png"/><strong> Actualizar</strong>',
								'url'=>array('update','id'=>$model->idproductos), "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/search.png"/><strong> Buscar</strong>',
								'url'=>'admin', "htmlOptions" => array("class"=>"btn btn-info")),

						)
				));
?>

<h1>Vista Producto</h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'htmlOptions' => array('class'=>'detail-view','style'=>'background-color:#FFFFFF; box-shadow: 0px 0px 2px 0 black;'),
'type'=>'striped',
'attributes'=>array(
		'idproductos',
		'nombre_productos',
),
)); ?>
