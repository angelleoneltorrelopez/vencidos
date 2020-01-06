<?php

$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
            "buttons"=>array(
                array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/search.png"/><strong> Buscar</strong>',
								'url'=>'admin', "htmlOptions" => array("class"=>"btn btn-info")),
            )
        ));
?>

<h1>Crear Politica</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
