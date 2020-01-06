<?php

$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
            "buttons"=>array(
                array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/add.png"/> Crear',
								'url'=>'create', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/pdf.png"/> PDF',
								'url'=>'generarpdf', "htmlOptions" => array("class"=>"btn btn-info")),
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/excel.png"/> EXCEL',
								'url'=>'excel', "htmlOptions" => array("class"=>"btn btn-info")),
            )
        ));
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('proveedores-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Buscar Proveedor</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
	'type' => 'hover',
'htmlOptions' => array('class'=>'well','style'=>'background-color: #FFFFFF;'),
'id'=>'proveedores-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
			 'name'=>'idproveedor',
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688; width: 20%;'),
			),
	array(
			 'name'=>'nombreprov',
			 'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			),
array(
'class'=>'booster.widgets.TbButtonColumn',
'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
),
),
'emptyText' => 'No se encontro ningun proveedor!',

'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',
)); ?>
