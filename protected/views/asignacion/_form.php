<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'asignacion-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'idcasa'),
	'htmlOptions' => array('class'=>'well','style'=>'background-color:#FFFFFF;'),
)); ?>

<blockquote>Campos con <span class="required">*</span> son requeridos.</blockquote>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="form-group col-md-4">
		<?php echo $form->labelEx( $model,'idcasa', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
				        'model'=>$model,
				        'attribute'=>'idcasa',
				        'data'=>CHtml::listData(Casa::model()->findAll(array('order'=>'nombrecasa')), 'idcasa', 'nombrecasa'),
								'options' => array(
				                    'width' => '100%',),
				)); ?>

</div>
<div class="form-group col-md-4">
	<?php echo $form->labelEx( $model,'idproveedor', array('class'=>'className')); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
			        'model'=>$model,
			        'attribute'=>'idproveedor',
			        'data'=>CHtml::listData(Proveedores::model()->findAll(array('order'=>'nombreprov')), 'idproveedor', 'nombreprov'),
							'options' => array(
			                    'width' => '100%',),
			)); ?>

</div>
<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'politica', array('class'=>'className')); ?>
		<?php $this->widget('bootstrap.widgets.TbSelect2',array(
						'model'=>$model,
						'attribute'=>'politica',
						'data'=> array(
							  '0'  => 'En el mes',
								'-1'  => 'No Devolucion',
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5'
						),
						'options' => array('width' => '100%'),
		)); ?>
</div>
</div>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Asignar' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'indent-left' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
