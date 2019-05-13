<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'casa-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($model,'nombrecasa'),
	'htmlOptions' => array('class'=>'well','style'=>'background-color:#FFFFFF;'),
)); ?>

<blockquote>Campos con <span class="required">*</span> son requeridos.</blockquote>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nombrecasa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'black-text','maxlength'=>150)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
