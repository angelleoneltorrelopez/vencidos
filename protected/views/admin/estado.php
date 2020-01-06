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

	<h1>Cambiar de estado</h1>

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
		'id'=>'admin-form',
		'enableAjaxValidation'=>true,
		'htmlOptions' => array('class'=>'well','style'=>'background-color:#FFFFFF;'),
		));
		?>

	<div class="row">


	<blockquote>Seleccionar caducinad y el estado a cambiar</blockquote>

	</div>
	<div class="row">
	    <div class="form-group col-md-3">
	<?php echo $form->labelEx( $model,'Caducidad', array('class'=>'className') ); ?>
	<?php $this->widget('bootstrap.widgets.TbSelect2',array(
	        'model'=>$model,
	        'attribute'=>'Caducidad',
	        'data'=> CHtml::listData(Ingreso::model()->findAll(array('order'=>'Caducidad ASC')), 'Caducidad', 'Caducidad'),
					'options' => array(
	                    'width' => '100%',),
	)); ?>
	</div>
	<div class="form-group col-md-3">
	<?php echo $form->labelEx($model,'Estado', array('class'=>'className')); ?>
	<?php $this->widget('bootstrap.widgets.TbSelect2',array(
					'model'=>$model,
					'attribute'=>'Estado',
					'data'=> array(
							'0'  => 'Activo',
							'1'  => 'Inactivo',
					),
					'options' => array(
	                    'width' => '100%',),
	)); ?>
	</div>
	</div>


	<div class="row">

	<div class="form-group col-md-4">
	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
				'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
			)); ?>
	</div>
	</div>
	</div>
	<?php $this->endWidget(); ?>

	<?php $this->widget('booster.widgets.TbGridView',array(
	'type' => 'hover ',
	'htmlOptions' => array('class'=>'well','style'=>'background-color: #FFFFFF;'),
	'id'=>'admin-grid',
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
				'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			    ),
			array(
				'name' => 'Lote',
				'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			    ),

			array(
				'name' => 'Estado',
				'filter' => array('0'=>'Activo','1'=>'Inactivo'),
				'value'=> '$data["Estado"]==0?"Activo":"Inactivo"',
				'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			    ),
			array(
				'name' => 'Usuario',
				'filter' => CHtml::listData(Ingreso::model()->findAll(array('condition'=>'Estado = 0', 'order'=>'Caducidad ASC')), 'Usuario', 'Usuario'),
				'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			    ),
			array(
				'name' => 'regDate',
				'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
			    ),


	array(
	'class'=>'booster.widgets.TbButtonColumn',
	'headerHtmlOptions'=>array('style'=>'text-align: center; background-color: #009688;'),
	),
	),
	'emptyText' => 'No se encontro ningun producto!',

	'summaryText' => 'Mostrando {start}-{end} de {count} registro(s).',

	)); ?>
