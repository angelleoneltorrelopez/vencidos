<?php

	$this->widget("bootstrap.widgets.TbButtonGroup", array(
							'buttonType' => 'link',
							'encodeLabel'=>false,
							'htmlOptions'=>array('class'=>'pull-right'),
	            "buttons"=>array(
	                array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/><strong> Crear</strong>',
									'url'=>'../create', "htmlOptions" => array("class"=>"btn btn-info")),
									array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/eye.png"/><strong> Ver</strong>',
									'url'=>array('view','id'=>$model->Id), "htmlOptions" => array("class"=>"btn btn-info")),
									array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/search.png"/><strong> Buscar</strong>',
									'url'=>'../admin', "htmlOptions" => array("class"=>"btn btn-info")),
	            )
	        ));



	?>

	<h1>Actualizar Ingreso ID: <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
