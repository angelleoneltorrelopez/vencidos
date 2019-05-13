<?php
$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
						"buttons"=>array(
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/><strong> Crear</strong>',
								'url'=>'create', "htmlOptions" => array("class"=>"btn btn-info")),

								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/delete.png"/><strong> Borrar</strong>',
								'url'=>'#', "htmlOptions" => array("class"=>"btn btn-info",'submit'=>array('delete','id'=>$model->Id),'confirm'=>
								'Seguro querer borrar este ingreso?')),

								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/exchange.png"/><strong> Actualizar</strong>',
								'url'=>array('update','id'=>$model->Id), "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/search.png"/><strong> Buscar</strong>',
								'url'=>'admin', "htmlOptions" => array("class"=>"btn btn-info")),

						)
				));

?>

<h1>Vista Ingreso #<?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_formadmin', array('model'=>$model)); ?>
