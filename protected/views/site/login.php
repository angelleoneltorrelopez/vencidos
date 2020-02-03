
<div class="container">
	<div class="row">
        <div class="col-md-6 col-md-offset-3">


<div class="form">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
	'focus'=>array($model,'username'),
	'htmlOptions' => array('class'=>'','style'=>' max-width: 80%;
padding: 0px;
margin: 0 auto;'),
)); ?>
<div class="row">
			<div class="col-md-6 col-md-offset-3">
<h1 class="text-center"><b>Login</b></h1>
</div>
</div>
	<div class="row">
		<?php echo $form->textFieldGroup($model,'username',array('label'=>'','widgetOptions'=>array('htmlOptions'=>array('placeholder'=>'Usuario','maxlength'=>10, 'class'=>'text-center' )))); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordFieldGroup($model,'password',array('label'=>'','widgetOptions'=>array('htmlOptions'=>array('placeholder'=>'Password','maxlength'=>15,'class'=>'text-center')))); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>'',
				'size'=>'block',
				'icon'=>'log-in',
			)); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkboxGroup($model,'rememberMe',array('label'=>'Recordarme')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
    </div>
