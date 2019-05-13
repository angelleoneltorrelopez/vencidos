<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'idproducto'),
	'htmlOptions' => array('class'=>'well','style'=>'background-color:#FFFFFF;'),
	));

	?>

<div class="row">


<blockquote>Campos con <span class="required">*</span> son requeridos.</blockquote>

<?php echo $form->errorSummary($model); ?>
</div>
<div class="row">
    <div class="form-group col-md-4">
<?php echo $form->labelEx( $model,'idproducto', array('class'=>'className') ); ?>
<?php $this->widget('bootstrap.widgets.TbSelect2',array(
        'model'=>$model,
        'attribute'=>'idproducto',
        'data'=>CHtml::listData(Productos::model()->findAll(array('order'=>'nombre_productos')), 'idproductos', 'nombre_productos'),
				'options' => array(
                    'width' => '100%',),
)); ?>
</div>
<div class="form-group col-md-4">
<?php echo $form->labelEx( $model,'idcasa'); ?>
		<?php $this->widget('bootstrap.widgets.TbSelect2',array(
		        'model'=>$model,
		        'attribute'=>'idcasa',
		        'data'=>CHtml::listData(Casa::model()->findAll(array('order'=>'nombrecasa')), 'idcasa', 'nombrecasa'),
						'options' => array(
		                    'width' => '100%',),
		)); ?>
</div>
<div class="form-group col-md-4">
<?php echo $form->labelEx( $model,'idproveedor'); ?>
		<?php $this->widget('bootstrap.widgets.TbSelect2',array(
		        'model'=>$model,
		        'attribute'=>'idproveedor',
		        'data'=>CHtml::listData(Proveedores::model()->findAll(array('order'=>'nombreprov')), 'idproveedor', 'nombreprov'),
						'options' => array('width' => '100%'),
		)); ?>
</div>
</div>

<div class="row">
    <div class="form-group col-md-4">
    <?php echo $form->labelEx($model,'Politica'); ?>
		<?php $this->widget('bootstrap.widgets.TbSelect2',array(
						'model'=>$model,
						'attribute'=>'Politica',
						'data'=> array(
							  '-1'  => 'No Devolucion',
                '0'  => 'En el mes',
                '1' => '1',
                '2' => '2',
								'3' => '3',
                '4' => '4',
                '5' => '5'
            ),
						'options' => array('width' => '100%'),
		)); ?>
</div>
<div class="form-group col-md-4">
	<?php echo $form->datePickerGroup($model,'Caducidad',array('widgetOptions'=>array('options'=>array('language' =>'es',
	'format'=>'yyyy-mm-dd','minViewMode'=>'months'),
	'htmlOptions'=>array('class'=>'span3','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>
<div class="form-group col-md-4">
<?php echo $form->textFieldGroup($model,'Lote',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>15)))); ?>
</div>
</div>
<div class="row">
<div class="form-group col-md-12">
<?php echo $form->labelEx($model,'Estado'); ?>
<?php $this->widget('bootstrap.widgets.TbSelect2',array(
				'model'=>$model,
				'attribute'=>'Estado',
				'data'=> array(
						'0'  => 'Activo',
						'1'  => 'Inactivo',
				),
)); ?>
</div>
<div class="form-group col-md-4">
<?php echo $form->hiddenField($model,'Usuario', array('value'=> ''.strtolower(Yii::app()->user->name).'')); ?>

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
