<?php
$this->widget("bootstrap.widgets.TbButtonGroup", array(
						'buttonType' => 'link',
						'encodeLabel'=>false,
						'htmlOptions'=>array('class'=>'pull-right'),
            "buttons"=>array(
								array('label'=>'<img src="'.Yii::app()->baseUrl.'/images/pdf.png"/><strong> Estado</strong>',
								'url'=>'estado', "htmlOptions" => array("class"=>"btn btn-info")),
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
	$('#estado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Cambio de Estados</h1>

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
			'filter' => CHtml::listData(Ingreso::model()->findAll(array('order'=>'Caducidad ASC')), 'Caducidad', 'Caducidad'),
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
