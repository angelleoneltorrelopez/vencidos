<?php

$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
            "buttons"=>array(
                array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/><strong> Crear</strong>',
								'url'=>'create', "htmlOptions" => array("class"=>"btn btn-info")),
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
$.fn.yiiGridView.update('casa-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Buscar Casas</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
	'type' => 'hover ',
'htmlOptions' => array('class'=>'well','style'=>'background-color: #FFFFFF;'),
'id'=>'casa-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
			 'name'=>'idcasa',
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688; width: 20%'),
			),
	array(
			 'name'=>'nombrecasa',
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			),
array(
'class'=>'booster.widgets.TbButtonColumn',
'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
),
),
'emptyText' => 'No se encontro ningun usuario!',

'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',
)); ?>